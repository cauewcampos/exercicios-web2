<?php
require 'conexao.php'; require 'verifica_login.php'; $u = $_SESSION['usuario_id'];
r = $conn->query("SELECT * FROM atividades WHERE usuario_id=$u ORDER BY data_criacao DESC"); ?>
<h3>Minhas Atividades</h3>
<table class="table table-bordered">
<tr><th>Título</th><th>Data</th><th>Ver</th></tr>
<?php while($l=$r->fetch_assoc()): ?>
<tr><td><?=$l['titulo']?></td><td><?=$l['data_criacao']?></td><td><a href="participa_atividade.php?id=<?=$l['id']?>" class="btn btn-sm btn-info">Abrir</a></td></tr>
<?php endwhile; ?>