<?php require 'conexao.php'; require 'verifica_login.php'; ?>
<h3>Submissões</h3>
<a href="envia_submissao.php" class="btn btn-primary mb-3">Enviar nova submissão</a>
<table class="table table-bordered">
<tr><th>Título</th><th>Usuário</th><th>Data</th><th>Arquivo</th><th>Ações</th></tr>
<?php
$sql = "SELECT s.*, u.usuario FROM submissoes s JOIN usuarios u ON s.usuario_id=u.id ORDER BY s.data_submissao DESC";
$r = $conn->query($sql);
while($l = $r->fetch_assoc()): ?>
<tr>
<td><?=$l['titulo']?></td>
<td><?=$l['usuario']?></td>
<td><?=$l['data_submissao']?></td>
<td><a href="uploads/<?=$l['arquivo']?>" target="_blank">Abrir</a></td>
<td><a class="btn btn-sm btn-success" href="avalia_submissao.php?id=<?=$l['id']?>">Avaliar</a></td>
</tr>
<?php endwhile; ?>
</table>


