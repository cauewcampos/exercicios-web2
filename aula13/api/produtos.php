<?php
include 'config.php';
header('Content-Type: application/json');
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY nome");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $sql = "INSERT INTO produtos (nome, descricao, data_validade, quantidade_estoque, estoque_minimo, ultimo_preco) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $data['nome'], $data['descricao'], $data['data_validade'],
        $data['quantidade_estoque'], $data['estoque_minimo'], $data['ultimo_preco']
    ]);
    
    echo json_encode(['status' => 'sucesso', 'id' => $pdo->lastInsertId()]);
}
?>