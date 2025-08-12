<?php
include "db.php";
session_start();

$nome = $_SESSION['nome'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$descricao = $_POST['descricao'];

$usuario = $conn->query("SELECT id FROM usuarios WHERE nome_completo = '$nome'")->fetch_assoc();
$id_usuario = $usuario['id'];

$sql = "INSERT INTO residencias (id_usuario, cep, endereco, descricao)
        VALUES ('$id_usuario', '$cep', '$endereco', '$descricao')";

if ($conn->query($sql)) {
    echo "Residência salva com sucesso!";
} else {
    echo "Erro ao salvar residência.";
}
?>
