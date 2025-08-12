<?php
include "db.php";
session_start();

$id_remetente = $_SESSION['id'] ?? 0;
$cep_dest = $_POST['cep'] ?? '';
$quantidade = floatval($_POST['quantidade'] ?? 0);
$tipo = $_POST['tipo'] ?? 'gratis';
$preco = floatval($_POST['preco'] ?? 0);

if (!$id_remetente || !$cep_dest || $quantidade <= 0) {
    echo "Dados inválidos para transferência.";
    exit;
}

// Busca destinatário pelo CEP
$sqlDest = "SELECT u.id, u.energia_disponivel FROM usuarios u
            JOIN residencias r ON r.id_usuario = u.id
            WHERE r.cep = '$cep_dest' LIMIT 1";
$resultDest = $conn->query($sqlDest);

if (!$resultDest || $resultDest->num_rows == 0) {
    echo "Destinatário não encontrado.";
    exit;
}

$destinatario = $resultDest->fetch_assoc();
$id_dest = $destinatario['id'];
$energia_dest = floatval($destinatario['energia_disponivel']);

// Busca energia do remetente
$sqlRem = "SELECT energia_disponivel FROM usuarios WHERE id = $id_remetente LIMIT 1";
$resultRem = $conn->query($sqlRem);

if (!$resultRem || $resultRem->num_rows == 0) {
    echo "Remetente não encontrado.";
    exit;
}

$energia_rem = floatval($resultRem->fetch_assoc()['energia_disponivel']);

if ($quantidade > $energia_rem) {
    echo "Quantidade maior que a energia disponível.";
    exit;
}

// Atualiza energia
$nova_energia_rem = $energia_rem - $quantidade;
$nova_energia_dest = $energia_dest + $quantidade;

$conn->begin_transaction();

try {
    $conn->query("UPDATE usuarios SET energia_disponivel = $nova_energia_rem WHERE id = $id_remetente");
    $conn->query("UPDATE usuarios SET energia_disponivel = $nova_energia_dest WHERE id = $id_dest");

    // Aqui você pode inserir registro da transação, venda, etc.
    $sqlTrans = "INSERT INTO transferencias (id_remetente, id_destinatario, quantidade, tipo, preco)
                 VALUES ($id_remetente, $id_dest, $quantidade, '$tipo', $preco)";
    $conn->query($sqlTrans);

    $conn->commit();
    echo "Transferência de energia realizada com sucesso!";
} catch (Exception $e) {
    $conn->rollback();
    echo "Erro na transferência: " . $e->getMessage();
}
?>
