<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de comentário</title>
</head>
<body>
        <h1>Dados do produto:</h1>
        <form action="recebe_comentario.php" method="post">
            
            <?php
                if(isset($_GET['id'])){
                ?>
                    <?php
                        $id_prod = $_GET['id'];
                        echo "Produto: {$id_prod}."
                    ?>
                    <input type="hidden" name="id_produto" value='<?=$_GET['id']?>'><br>
                <?php
                } else {
                ?>
                    <label for="">ID Produto:</label>
                    <input type="text" name="id_produto"><br>
                <?php
                }
                ?>
        
                <label for="">Digite seu comentário:</label>
                <input type="text" name="comentario"><br>
                <input type="submit">
        </form>
</body>
</html>