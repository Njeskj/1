<?php
// login.php
include '../config.php';

// Verifique se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Busque o usuário no banco de dados pelo email fornecido
    $sql = "SELECT id, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verifique a senha fornecida com a senha criptografada no banco de dados
        if (password_verify($password, $hashed_password)) {
            // Inicie a sessão e redirecione para a página de perfil após o login bem-sucedido
            session_start();
            $_SESSION['user_id'] = $row["id"];
            header("Location: ../pages/profile.php");
            exit();
        } else {
            $error_message = "Senha incorreta. Por favor, tente novamente.";
        }
    } else {
        $error_message = "Email não encontrado. Por favor, verifique o email digitado.";
    }
}
?>

<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<h1>Login</h1>
<!-- Formulário de login -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Entrar</button>
            </form>

<?php include '../includes/footer.php'; ?>

<script src="js/script.js"></script>