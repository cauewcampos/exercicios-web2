<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encerrar Sessão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <?php
        $atual = 'encerra-sessao.php';
        include "navbar.php";

        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $config = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $config["path"], $config["domain"],
                $config["secure"], $config["httponly"]
            );
        }
        session_destroy();

        echo "<p class='m-1'>Sessão encerrada com sucesso.</p>";
        echo "<p class='m-1'>Você será redirecionado em 5 segundos...</p>";
        echo "<script>setTimeout(()=>{window.location.href='primeira.php';}, 5000);</script>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>