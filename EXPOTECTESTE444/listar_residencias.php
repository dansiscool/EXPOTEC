<?php
include "db.php";
session_start();

if (!isset($_SESSION['nome'])) {
    echo json_encode([]);
    exit;
}

$nome = $_SESSION['nome'];

// Busca todas residências cadastradas para o usuário
$sql = "SELECT r.cep, r.endereco FROM residencias r
        JOIN usuarios u ON u.id = r.id_usuario
        WHERE u.nome_completo = '$nome'";

$result = $conn->query($sql);
$residencias = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        $residencias[] = $row;
    }
}

echo json_encode($residencias);
?>
