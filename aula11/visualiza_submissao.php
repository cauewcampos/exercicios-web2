<?php
require 'conexao.php'; require 'verifica_login.php';
$id = $_GET['id'];
$s = $conn->query("SELECT * FROM submissoes WHERE id=$id")->fetch_assoc();
$a = $conn->query("SELECT a.*, u.usuario FROM avaliacoes a JOIN usuarios u ON a.usuario_id=u.id WHERE submissao_id=$id ORDER BY data_avaliacao DESC");
?>
<h3><?=$s['titulo']?></h3>
<p><b>Observações:</b> <?=$s['observacoes']?></p>
<p><a href="uploads/<?=$s['arquivo']?>" target="_blank">Abrir arquivo</a></p>
<h4>Comentários / Avaliações</h4>
<?php while($c=$a->fetch_assoc()): ?>
<div class="border p-2 mb-2">
<b><?=$c['usuario']?>:</b> <?=$c['comentario']?> (<?=$c['aprovado'] ? 'Aprovado' : 'Reprovado'?>)
</div>
<?php endwhile; ?>