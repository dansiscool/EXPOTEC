<?php
include "db.php";
session_start();

$remetente = $_SESSION['nome'];
$destinatario_nome = $_POST['destinatario_nome'];
$cep = $_POST['cep'];
$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];
$tipo = $_POST['tipo'];
$preco = $_POST['preco'];

$rem = $conn->query("SELECT id, energia_disponivel FROM usuarios WHERE nome_completo = '$remetente'")->fetch_assoc();
$dest = $conn->query("SELECT u.id FROM usuarios u
  JOIN residencias r ON u.id = r.id_usuario
  WHERE u.nome_completo = '$destinatario_nome' AND (r.cep = '$cep' OR r.descricao = '$descricao')")->fetch_assoc();

if (!$rem || !$dest) {
    echo "Usuário ou residência não encontrada.";
    exit;
}

if ($rem['energia_disponivel'] < $quantidade) {
    echo "Energia insuficiente.";
    exit;
}

$conn->query("UPDATE usuarios SET energia_disponivel = energia_disponivel - $quantidade WHERE id = {$rem['id']}");
$conn->query("UPDATE usuarios SET energia_disponivel = energia_disponivel + $quantidade WHERE id = {$dest['id']}");

$conn->query("INSERT INTO transferencias (remetente_id, destinatario_id, quantidade, tipo, preco_total)
              VALUES ({$rem['id']}, {$dest['id']}, $quantidade, '$tipo', $preco)");

echo "Transferência realizada!";
?>
