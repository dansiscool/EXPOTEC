<?php
include "db.php";

$cep = $_GET['cep'] ?? '';

if (!$cep) {
    echo json_encode(null);
    exit;
}

$sql = "SELECT u.nome_completo AS nome, u.telefone, r.endereco
        FROM usuarios u
        JOIN residencias r ON r.id_usuario = u.id
        WHERE r.cep = '$cep' LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(null);
}
?>
