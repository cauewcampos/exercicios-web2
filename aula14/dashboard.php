<?php
// dashboard.php
require 'db.php';
session_start();
// Redireciona se não estiver logado
if (!isset($_SESSION['usuario_id'])) { header("Location: index.php"); exit; } 

$user_id = $_SESSION['usuario_id'];

// Lógica de importação (POST)
if (isset($_POST['salvar_historico'])) {
    $texto = $_POST['historico_texto'];
    
    // REMOVIDO: $pdo->prepare("DELETE FROM notas WHERE usuario_id = ?")->execute([$user_id]);
    // Agora faremos um UPSERT (INSERT OR UPDATE) para preservar dados.

    $linhas = explode("\n", $texto);
    
    foreach ($linhas as $linha) {
        $linha = trim($linha);
        if (empty($linha)) continue;

        $colunas = explode("\t", $linha);

        // Ajustado para >= 9 para ser mais robusto com a contagem de colunas do SUAP
        if (count($colunas) >= 9) { 
            $semestreStr = trim($colunas[1]); 
            
            if (is_numeric($semestreStr)) {
                $semestre = (int)$semestreStr;
                $disciplina = trim($colunas[4]);
                $situacao = trim($colunas[8]); 
                
                $notaBruta = trim($colunas[6]);
                $nota = null;
                if ($notaBruta !== '-' && $notaBruta !== '') {
                    $nota = floatval(str_replace(',', '.', $notaBruta));
                }

                $freqBruta = trim($colunas[7]);
                $frequencia = null;
                if ($freqBruta !== '-' && $freqBruta !== '') {
                    $limpa = str_replace(['%', ','], ['', '.'], $freqBruta);
                    $frequencia = floatval($limpa);
                }

                // 1. Tenta encontrar a nota existente com base no usuário, semestre e disciplina
                $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM notas WHERE usuario_id = ? AND semestre = ? AND disciplina = ?");
                $stmt_check->execute([$user_id, $semestre, $disciplina]);
                $exists = $stmt_check->fetchColumn();

                if ($exists) {
                    // 2. Se existe, atualiza os dados (UPSERT - UPDATE)
                    $stmt = $pdo->prepare("
                        UPDATE notas 
                        SET nota = ?, frequencia = ?, situacao = ? 
                        WHERE usuario_id = ? AND semestre = ? AND disciplina = ?
                    ");
                    $stmt->execute([$nota, $frequencia, $situacao, $user_id, $semestre, $disciplina]);
                } else {
                    // 3. Se não existe, insere a nova nota (UPSERT - INSERT)
                    $stmt = $pdo->prepare("
                        INSERT INTO notas (usuario_id, semestre, disciplina, nota, frequencia, situacao) 
                        VALUES (?, ?, ?, ?, ?, ?)
                    ");
                    $stmt->execute([$user_id, $semestre, $disciplina, $nota, $frequencia, $situacao]);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Histórico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Novo Fundo Escuro para o corpo */
        body {
            background-color: #212529; 
            color: #ffffff;
        }

        /* Cores de status adaptadas para o tema escuro */
        .status-aprovado { color: #38a786 !important; font-weight: bold; } /* Verde Mar */
        .status-reprovado { color: #e76f51 !important; font-weight: bold; } /* Vermelho Queimado */
        .status-cursando { color: #5aa9e6 !important; font-style: italic; } /* Azul Claro */
        .baixa-frequencia { color: #e76f51 !important; font-weight: bold; } /* Vermelho Queimado */

        /* Estilo para cards em tema escuro */
        .card {
            background-color: #343a40; /* Fundo do card ligeiramente mais claro que o body */
            color: #ffffff;
            border: 1px solid #495057;
        }

        /* Headers de Cards e Tabelas */
        .bg-custom-primary { background-color: #4c6a99 !important; } /* Cor Principal Azul Petróleo */
        .table-light, .card-header.bg-light { 
            background-color: #495057 !important; /* Cor cinza escuro para cabeçalhos e thead */
            color: #ffffff;
        }
        .table-hover > tbody > tr:hover > td,
        .table-hover > tbody > tr:hover > th {
            background-color: #495057; /* Hover escuro */
        }
        /* Mudar cor do texto da Navbar */
        .navbar-dark .navbar-brand, .navbar-dark .btn-outline-light {
            color: #ffffff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Processar histórico - SUAP</a>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-custom-primary text-white">Importar Dados</div>
                <div class="card-body">
                    <form method="POST">
                        <label class="form-label small text-white">Copie a tabela do SUAP e cole aqui:</label>
                        <textarea name="historico_texto" class="form-control mb-3" rows="10" placeholder="Cole aqui..." style="background-color: #495057; color: #ffffff; border-color: #495057;"></textarea>
                        <button type="submit" name="salvar_historico" class="btn btn-primary bg-custom-primary border-custom-primary w-100">Atualizar Grade</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <span class="fw-bold">Grade Curricular</span>
                    
                    <div class="d-flex gap-2"> 
                        <select id="filtroSemestre" class="form-select w-auto" onchange="carregarNotas()">
                            <option value="todos">Todos os Semestres</option>
                            <?php for($i=1; $i<=10; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?>º Semestre</option>
                            <?php endfor; ?>
                        </select>

                        <select id="filtroSituacao" class="form-select w-auto" onchange="carregarNotas()">
                            <option value="todos">Todas as Situações</option>
                            <option value="Aprovado">Aprovado</option>
                            <option value="Reprovado">Reprovado</option>
                            <option value="Cursando">Cursando</option>
                        </select>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sem.</th>
                                    <th>Disciplina</th>
                                    <th class="text-center">Nota</th>
                                    <th class="text-center">Freq.</th> <th class="text-end">Situação</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaNotas">
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function carregarNotas() {
    const semestre = document.getElementById('filtroSemestre').value;
    const situacao = document.getElementById('filtroSituacao').value;
    const tabela = document.getElementById('tabelaNotas');
    
    tabela.innerHTML = '<tr><td colspan="5" class="text-center py-3">Carregando...</td></tr>';

    try {
        // Usa ambos os filtros na chamada à API
        const response = await fetch(`api_notas.php?semestre=${semestre}&situacao=${situacao}`);
        const dados = await response.json();

        tabela.innerHTML = '';

        if(dados.length === 0) {
            tabela.innerHTML = '<tr><td colspan="5" class="text-center py-3 text-muted">Nenhuma informação encontrada.</td></tr>';
            return;
        }

        dados.forEach(d => {
            let classeStatus = '';
            if (d.situacao.includes('Aprovado')) classeStatus = 'status-aprovado';
            else if (d.situacao.includes('Reprovado')) classeStatus = 'status-reprovado';
            else classeStatus = 'status-cursando';
            
            let notaFormatada = d.nota !== null ? d.nota : '-';

            let freqFormatada = d.frequencia !== null ? d.frequencia + '%' : '-';
            // Se frequência < 75, aplica 'baixa-frequencia' (vermelho)
            let classeFreq = (d.frequencia !== null && d.frequencia < 75) ? 'baixa-frequencia' : ''; 

            let html = `
                <tr>
                    <td class="text-muted small">${d.semestre}º</td>
                    <td>${d.disciplina}</td>
                    <td class="text-center"><strong>${notaFormatada}</strong></td>
                    <td class="text-center ${classeFreq}">${freqFormatada}</td>
                    <td class="text-end ${classeStatus}">${d.situacao}</td>
                </tr>
            `;
            tabela.innerHTML += html;
        });
    } catch (e) {
        console.error(e);
        tabela.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Erro na API.</td></tr>';
    }
}

carregarNotas();
</script>

</body>
</html>