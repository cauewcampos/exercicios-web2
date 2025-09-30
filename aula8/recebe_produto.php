<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    $servername = 'localhost';
    $banco = 'opina';
    $username = 'root';
    $password = '';

    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $produto = $_POST['produto'];
    $id_criador = $_SESSION['id'];
    $comando = "INSERT INTO produtos (nome, id_criador) VALUES (:produto, :id_criador)";
    $sth = $conexao->prepare($comando);
    $sth->bindParam(':produto', $produto);
    $sth->bindParam(':id_criador', $id_criador);
    

    // executar
    $resultado = $sth->execute();

    // verificar resultado
    if($resultado) {
    echo "Produto ($produto) salvo com sucesso!";
    } else {
    echo "Erro ao salvar o produto.";
    }
    ?>
</body>
</html>