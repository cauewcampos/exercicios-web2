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
        echo "Olá, {$_SESSION['nome']}.";
    ?>
    <h1>Dados do produto:</h1>
    <form action="recebe_produto.php" method="post">
            <label for="">Nome do produto:</label>
            <input type="text" name="produto"><br>
            <input type="submit">
    </form>
</body>
</html>