<?php
include "db.php";
session_start();

if (!isset($_SESSION['nome'])) {
    echo json_encode(null);
    exit;
}

$nome = $_SESSION['nome'];
$sql = "SELECT u.nome_completo, u.telefone, r.cep, r.endereco, u.energia_disponivel 
        FROM usuarios u
        LEFT JOIN residencias r ON r.id_usuario = u.id
        WHERE u.nome_completo = '$nome' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "nome" => $row['nome_completo'],
        "telefone" => $row['telefone'],
        "cep" => $row['cep'],
        "endereco" => $row['endereco'],
        "energia_disponivel" => $row['energia_disponivel']
    ]);
} else {
    echo json_encode(null);
}
?>
