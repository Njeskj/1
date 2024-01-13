<?php
// process_register.php

// Verificar se o formulário foi enviado através do método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter os dados do formulário
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $address = $_POST["address"];
    $neighborhood = $_POST["neighborhood"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];

    // Validar os dados (por exemplo, verificar se os campos estão preenchidos e se as senhas coincidem)
    $errors = array();

    if (empty($name)) {
        $errors[] = "O campo Nome é obrigatório.";
    }

    if (empty($email)) {
        $errors[] = "O campo Email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "O email inserido é inválido.";
    }

    if (empty($password)) {
        $errors[] = "O campo Senha é obrigatório.";
    } elseif (strlen($password) < 6) {
        $errors[] = "A senha deve conter pelo menos 6 caracteres.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "As senhas não coincidem.";
    }

    // Se houver erros, redirecionar para a página de registro com os erros exibidos
    if (!empty($errors)) {
        session_start();
        $_SESSION["register_errors"] = $errors;
        header("Location: ../pages/register.php");
        exit();
    }

    // Se tudo estiver correto, salvar os dados no banco de dados
    try {
        // Conexão com o banco de dados (usando PDO para MySQL)
        $pdo = new PDO("mysql:host=localhost;dbname=1", "root", "");

        // Preparar a consulta de inserção
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, endereco, bairro, cidade, estado, pais, telefone) VALUES (:nome, :email, :senha, :endereco, :bairro, :cidade, :estado, :pais, :telefone)");

        // Executar a consulta com os valores dos campos
        $stmt->execute([
            "nome" => $name,
            "email" => $email,
            "senha" => password_hash($password, PASSWORD_DEFAULT), // Criptografa a senha antes de salvar no banco
            "endereco" => $address,
            "bairro" => $neighborhood,
            "cidade" => $city,
            "estado" => $state,
            "pais" => $country,
            "telefone" => $phone
        ]);

        // Redirecionar o usuário para a página de perfil ou outra página após o cadastro bem-sucedido
        header("Location: ../pages/profile.php");
        exit();
    } catch (PDOException $e) {
        // Tratar exceções (por exemplo, exibir uma mensagem de erro genérica ou registrar em um arquivo de log)
        die("Erro ao salvar no banco de dados: " . $e->getMessage());
    }
} else {
    // Se o formulário não foi submetido via POST, redirecionar para a página de registro
    header("Location: ../pages/register.php");
    exit();
}
?>
