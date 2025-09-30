<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar produtos</title>
</head>
<body>
    <h1>Produtos:</h1>
    <?php
        $servername = 'localhost';
        $banco = 'opina';
        $username = 'root';
        $password = '';
    
        $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

        $comando = "SELECT `id`, `nome` FROM `produtos`";

        $resultado = $conexao->query($comando);

    

        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "{$linha['nome']} id: {$linha['id']}<br>";
            echo "<a href='cadastro_comentario.php?id={$linha['id']}'> Adicionar comentario</a>";
            echo "<br>";
        }

    ?>

        
</body>
</html>