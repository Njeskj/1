<?php
// profile.php
include '../config.php';

// Verifique se o usuário está logado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/index.php");
    exit();
}

// Obtenha os dados atuais do usuário a partir do banco de dados
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Atualize os dados do usuário no banco de dados (supondo que você tenha uma tabela "users" com colunas como "name", "email", etc.)
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $user_id";
    $conn->query($sql);

    // Redirecione para a página de perfil após a edição
    header("Location: ../pages/profile.php");
    exit();
}
?>

<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<h1>Editar Perfil</h1>
<!-- Formulário para editar os dados do perfil -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" value="<?php echo $user_data['name']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $user_data['email']; ?>" required>
    <button type="submit">Salvar Alterações</button>
</form>

<?php include '../includes/footer.php'; ?>
