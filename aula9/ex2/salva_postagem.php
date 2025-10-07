<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publica</title>
</head>
<body>
    <?php
            $servername = 'localhost';
            $banco = 'rede-social';
            $username = 'root';
            $password = '';


    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $nome_arquivo = $_FILES['figura']['name'];

    $atual = $_FILES['figura']["tmp_name"];

    $destino = 'fotos/' . $nome_arquivo;

    $comando = "INSERT INTO `postagem` (`curtidas`, `caminho`) VALUES ('0', '$nome_arquivo')";


    $resultado = move_uploaded_file($atual, $destino);

    $resultado = $conexao->query($comando);

    if($resultado) {
        echo "Arquivo recebido com sucesso!";
    } else {
        echo "Erro ao enviar o arquivo!";
    }


    
    ?>

<br><br><br><br>
<form action="principal.php" >
    <input type="submit" value="Ver fotos">
    <form>
</body>
</html> 