<?php 
require 'conexao.php'; require 'verifica_login.php';
$id = $_GET['id'];
$s = $conn->query("SELECT s.*, u.usuario FROM submissoes s JOIN usuarios u ON s.usuario_id=u.id WHERE s.id=$id")->fetch_assoc();
?>
<h3>Avaliar Submissão</h3>
<p><b>Título:</b> <?=$s['titulo']?></p>
<p><b>Autor:</b> <?=$s['usuario']?></p>
<p><b>Observações:</b> <?=$s['observacoes']?></p>
<p><b>Arquivo:</b> <a href="uploads/<?=$s['arquivo']?>" target="_blank">Abrir</a></p>
<form action="salva_avaliacao.php" method="post">
<input type="hidden" name="submissao_id" value="<?=$s['id']?>">
<select name="aprovado" class="form-control mb-2">
<option value="1">Aprovar</option>
<option value="0">Reprovar</option>
</select>
<textarea name="comentario" class="form-control mb-2" placeholder="Comentário"></textarea>
<button class="btn btn-success">Salvar Avaliação</button>
</form>