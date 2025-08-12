<?php
include "db.php";
session_start();

$nome = $_POST['nome_completo'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome_completo, cpf, telefone, email, senha)
        VALUES ('$nome', '$cpf', '$telefone', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['nome'] = $nome;
    header("Location: main.html");
    exit;
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
