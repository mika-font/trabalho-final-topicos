<?php
session_start();

// Configuração do banco de dados (substitua pelos seus próprios dados)
$host = 'localhost';
$dbname = 'storemusic';
$user = 'root';
$password = '12345678';

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Função para verificar se o usuário está autenticado
function verificarAutenticacao() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: logout.php');
        exit();
    }
}

// CRUD de Pedidos
function listarPedidos() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM pedido");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function cadastrarPedido($id_usuario, $data_pedido, $status, $quant_item) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO pedido (id_usuario, data_pedido, status, quant_item) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_usuario, $data_pedido, $status, $quant_item]);
}

function obterPedido($id_pedido) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM pedido WHERE id_pedido = ?");
    $stmt->execute([$id_pedido]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function atualizarPedido($id_pedido, $status) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE pedido SET status = ? WHERE id_pedido = ?");
    $stmt->execute([$status, $id_pedido]);
}

function excluirPedido($id_pedido) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM pedido WHERE id_pedido = ?");
    $stmt->execute([$id_pedido]);
}
?>
