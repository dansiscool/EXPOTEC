<?php
header('Content-Type: text/plain; charset=utf-8');

$nome = $_POST['nome_completo'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (!$nome || !$cpf || !$telefone || !$email || !$senha) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=volt2u;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo "Este email já está cadastrado.";
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO usuarios (nome_completo, cpf, telefone, email, senha) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $cpf, $telefone, $email, $senhaHash]);

    echo "Cadastro realizado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
?>
