<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401); 
    echo json_encode(['erro' => 'Acesso não autorizado. Faça o login.']);
    exit;
}
$id_usuario_logado = $_SESSION['usuario_id'];
?>