<?php
session_start();
header('Content-Type: application/json');
include 'conexao.php';

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';
$senha = $data['senha'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $senha === $usuario['senha']) {
    
    $_SESSION['usuario_id'] = $usuario['id'];
    echo json_encode(['status' => 'sucesso']);

} else {
    http_response_code(401);
    echo json_encode(['status' => 'falha', 'mensagem' => 'E-mail ou senha inválidos.']);
}
?>