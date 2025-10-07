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
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['curtir_id'])) {
            $id = (int)$_POST['curtir_id'];
            $stmt = $conexao->prepare("UPDATE postagem SET curtidas = curtidas + 1 WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }

        $sth = $conexao->prepare("SELECT * FROM `postagem` ORDER BY curtidas DESC");
        $sth->execute();

        while ($result = $sth->fetch(PDO::FETCH_ASSOC)) {
            echo "<div style='margin-bottom:20px;'>";
            echo "<img src='fotos/" . htmlspecialchars($result['caminho']) . "' alt='Imagem postada' width='200'><br>";
            echo "<p>Curtidas: " . htmlspecialchars($result['curtidas']) . "</p>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='curtir_id' value='" . $result['id'] . "'>";
            echo "<button type='submit'>Curtir ❤️</button>";
            echo "</form>";
            echo "</div><hr>";
        }

    ?>

    <br><br>
    <form action="principal.php">
        <input type="submit" value="Voltar para principal">
    </form>
</body>
</html>
