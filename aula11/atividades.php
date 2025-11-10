<?php
require 'conexao.php'; require 'verifica_login.php';
$r = $conn->query("SELECT a.*, u.usuario FROM atividades a JOIN usuarios u ON a.usuario_id=u.id ORDER BY data_criacao DESC"); ?>
<h3>Atividades</h3>
<a href="envia_atividade.php" class="btn btn-primary mb-3">Criar atividade</a>
<table class="table table-bordered">
<tr><th>Título</th><th>Criador</th><th>Data</th><th>Ações</th></tr>
<?php while($l=$r->fetch_assoc()): ?>
<tr>
<td><?=$l['titulo']?></td>
<td><?=$l['usuario']?></td>
<td><?=$l['data_criacao']?></td>
<td><a class="btn btn-sm btn-info" href="participa_atividade.php?id=<?=$l['id']?>">Participar</a></td>
</tr>
<?php endwhile; ?>
</table>