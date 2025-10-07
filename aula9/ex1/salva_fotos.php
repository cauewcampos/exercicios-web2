<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe imagem</title>
</head>
<body>
    <?php
    $nome_arquivo = $_FILES['figura']['name'];

    $atual = $_FILES['figura']["tmp_name"];

    $destino = 'fotos/' . $nome_arquivo;

    $resultado = move_uploaded_file($atual, $destino);

    if($resultado) {
        echo "Arquivo recebido com sucesso!";
    } else {
        echo "Erro ao enviar o arquivo!";
    }

    echo "<br><br> <img src='$destino' width='300px'>";
    ?>
</body>
</html> 