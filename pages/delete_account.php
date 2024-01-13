<?php
// delete_account.php
include '../config.php';

// Verifique se o usuário está logado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/index.php");
    exit();
}

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    // Exclua a conta do usuário no banco de dados (supondo que você tenha uma tabela "users" com uma coluna "id" como chave primária)
    $sql = "DELETE FROM users WHERE id = $user_id";
    $conn->query($sql);

    // Encerre a sessão e redirecione para a página inicial após a exclusão da conta
    session_destroy();
    header("Location: ../pages/index.php");
    exit();
}
?>

<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<h1>Excluir Conta</h1>
<p>Tem certeza de que deseja excluir sua conta? Essa ação não pode ser desfeita.</p>
<!-- Formulário para confirmar a exclusão da conta -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <button type="submit">Excluir Conta</button>
</form>

<?php include '../includes/footer.php'; ?>
