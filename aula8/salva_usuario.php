<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = 'localhost';
    $banco = 'opina';
    $username = 'root';
    $password = '';

    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $comando = "INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES (NULL, '$nome', '$email', '$senha')";

    // preparar
    $sth = $conexao->prepare($comando);

    // executar
    $resultado = $sth->execute();

    // verificar resultado
    if($resultado) {
    echo "Usuário ($nome) salvo com sucesso!";
    } else {
    echo "Erro ao salvar o usuário.";
    }
    ?>
</body>
</html>