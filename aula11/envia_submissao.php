<h3>Enviar Submissão</h3>
<form action="salva_submissao.php" method="post" enctype="multipart/form-data">
  <input class="form-control mb-2" type="text" name="titulo" placeholder="Título" required>
  <textarea class="form-control mb-2" name="observacoes" placeholder="Observações"></textarea>
  <input class="form-control mb-2" type="file" name="arquivo" accept="application/pdf,text/plain" required>
  <button class="btn btn-primary">Salvar</button>
</form>
