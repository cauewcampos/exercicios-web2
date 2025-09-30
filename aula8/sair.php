<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Inicializa a sessão.
    // Se estiver sendo usado session_name("something"), não esqueça de usá-lo agora!
    session_start();

    // Apaga todas as variáveis da sessão
    $_SESSION = array();

    // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
    // Nota: Isto destruirá a sessão, e não apenas os dados!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }

    // Por último, destrói a sessão
    session_destroy();

    echo "Sessão encerrada!";
    ?> 
</body>
</html>