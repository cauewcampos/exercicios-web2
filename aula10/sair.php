<?php
session_start();
session_unset();
session_destroy();
echo "Você saiu.<br>";
echo "<a href='login.php'>Entrar novamente</a>";
?>
