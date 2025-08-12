<?php
include "db.php";
session_start();

if (!isset($_SESSION['nome'])) {
    echo "Usuário não autenticado";
    exit;
}

$nome = $_SESSION['nome'];
$cep = $_POST['cep'] ?? '';
$endereco = $_POST['endereco'] ?? '';

if (!$cep || !$endereco) {
    echo "Preencha todos os campos";
    exit;
}

// Buscar id do usuário
$sqlUser = "SELECT id FROM usuarios WHERE nome_completo = '$nome' LIMIT 1";
$resUser = $conn->query($sqlUser);
if ($resUser && $resUser->num_rows > 0) {
    $user = $resUser->fetch_assoc();
    $id_usuario = $user['id'];

    // Verifica se residência já existe
    $sqlCheck = "SELECT * FROM residencias WHERE id_usuario = $id_usuario";
    $resCheck = $conn->query($sqlCheck);

    if ($resCheck && $resCheck->num_rows > 0) {
        // Atualiza
        $sqlUpd = "UPDATE residencias SET cep = '$cep', endereco = '$endereco' WHERE id_usuario = $id_usuario";
        if ($conn->query($sqlUpd)) {
            echo "Residência atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar residência.";
        }
    } else {
        // Insere
        $sqlIns = "INSERT INTO residencias (id_usuario, cep, endereco) VALUES ($id_usuario, '$cep', '$endereco')";
        if ($conn->query($sqlIns)) {
            echo "Residência cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar residência.";
        }
    }
} else {
    echo "Usuário não encontrado.";
}
?>
