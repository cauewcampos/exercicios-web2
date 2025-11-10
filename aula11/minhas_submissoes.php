<?php
require 'conexao.php'; require 'verifica_login.php';
$uid = $_SESSION['usuario_id'];
$r = $conn->query("SELECT * FROM submissoes WHERE usuario_id=$uid ORDER BY data_submissao DESC");
?>
<h3>Minhas Submissões</h3>
<table class="table table-bordered">
<tr><th>Título</th><th>Data</th><th>Avaliações</th></tr>
<?php while($l=$r->fetch_assoc()): ?>
<tr>
<td><?=$l['titulo']?></td>
<td><?=$l['data_submissao']?></td>
<td><a class="btn btn-sm btn-info" href="visualiza_submissao.php?id=<?=$l['id']?>">Ver</a></td>
</tr>
<?php endwhile; ?>
</table>