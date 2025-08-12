<?php
header('Content-Type: application/json');
include "db.php";

$nome = $_POST['nome_completo'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if(!$nome || !$cpf || !$telefone || !$email || !$senha)
  exit(json_encode(['success'=>false,'message'=>'Preencha todos os campos.']));

$hash = password_hash($senha,PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO usuarios (nome_completo,cpf,telefone,email,senha) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$nome,$cpf,$telefone,$email,$hash);

if($stmt->execute()){
  exit(json_encode(['success'=>true,'message'=>'Cadastro realizado!']));
}else{
  exit(json_encode(['success'=>false,'message'=>'Erro ou e-mail já existe.']));
}
