<?php
require 'conexao.php'; require 'verifica_login.php';
$id = $_GET['id'];
a = $conn->query("SELECT a.*, u.usuario FROM atividades a JOIN usuarios u ON a.usuario_id=u.id WHERE a.id=$id")->fetch_assoc();
p = $conn->query("SELECT p.*, u.usuario FROM participacoes p JOIN usuarios u ON p.usuario_id=u.id WHERE atividade_id=$id ORDER BY data_participacao DESC"); ?>
<h3><?=$a['titulo']?></h3>
<p><b>Criador:</b> <?=$a['usuario']?></p>
<p><?=$a['comentario']?></p>
<h4>Participações</h4>
<?php while($x=$p->fetch_assoc()): ?>
<div class="border p-2 mb-2"><b><?=$x['usuario']?>:</b> <?=$x['comentario']?></div>
<?php endwhile; ?>
<form action="salva_participacao.php" method="post" class="mt-3">
<input type="hidden" name="atividade_id" value="<?=$id?>">
<textarea class="form-control mb-2" name="comentario" placeholder="Comente" required></textarea>
<button class="btn btn-success">Enviar</button>
</form>