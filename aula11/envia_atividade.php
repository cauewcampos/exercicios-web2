<?php
require 'conexao.php'; require 'verifica_login.php'; ?>
<h3>Criar Atividade</h3>
<form action="salva_atividade.php" method="post">
<input class="form-control mb-2" type="text" name="titulo" placeholder="Título" required>
<textarea class="form-control mb-2" name="comentario" placeholder="Comentário"></textarea>
<button class="btn btn-primary">Salvar</button>
</form>