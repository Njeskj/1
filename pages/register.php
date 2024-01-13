<?php
// register.php
include '../config.php';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $neighborhood = $_POST["neighborhood"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];

    // Verifique se o email já está registrado
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error_message = "O email já está registrado. Por favor, use um email diferente.";
    } else {
        // Criptografe a senha antes de salvá-la no banco de dados
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insira o novo usuário no banco de dados (supondo que você tenha uma tabela "users" com colunas como "name", "email", "password", etc.)
        $sql = "INSERT INTO users (name, email, password, address, neighborhood, city, state, country, phone) 
                VALUES ('$name', '$email', '$hashed_password', '$address', '$neighborhood', '$city', '$state', '$country', '$phone')";
        $conn->query($sql);

        // Redirecione para a página de perfil após o registro bem-sucedido
        header("Location: ../pages/profile.php");
        exit();
    }
}
?>

<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

    <main>
        <section class="register-form">
            <h1>Cadastre-se</h1>
            <form action="process_register.php" method="post">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmar Senha:</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>

                <!-- Novos campos adicionados -->
                <div class="form-group">
                    <label for="address">Endereço:</label>
                    <input type="text" name="address" id="address" required>
                </div>

                <div class="form-group">
                    <label for="neighborhood">Bairro:</label>
                    <input type="text" name="neighborhood" id="neighborhood" required>
                </div>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" name="city" id="city" required>
                </div>

                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text" name="state" id="state" required>
                </div>

                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text" name="country" id="country" required>
                </div>

                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input type="text" name="phone" id="phone" required>
                </div>

                <button type="submit" class="register-button">Cadastrar</button>
            </form>
        </section>
    </main>

<?php include '../includes/footer.php'; ?>

