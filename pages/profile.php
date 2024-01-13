<?php
// profile.php
include '../config.php';

// Verifique se o usuário está logado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/index.php");
    exit();
}

// Obtenha os dados do usuário a partir do banco de dados (supondo que você tenha uma tabela "users" com colunas como "name", "email", etc.)
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();
?>

<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<!-- Olá ao Usuário atual -->
<h1>Bem-vindo, <?php echo $user_data['name']; ?>!</h1>

<!-- Exiba os dados do perfil do usuário -->
<p>Nome: <?php echo $user_data['name']; ?></p>
<p>Email: <?php echo $user_data['email']; ?></p>

<!-- Links para Editar Perfil, Excluir Conta e Sair (Logout) -->
<div class="profile-links">
        <a href="#">Editar Perfil</a>
        <a href="#">Excluir Conta</a>
    </div>
    <div class="logout-link">
        <a href="logout.php">Sair</a>
    </div>
</section>


<?php include '../includes/footer.php'; ?>
