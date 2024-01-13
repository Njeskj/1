<?php
// index.php
include '../includes/header.php';

// Verifique se o usuário está logado
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../pages/profile.php");
    exit();
}
?>

<!-- Adicionar link para o CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

        <section class="hero">
            <div class="hero-content">
                <h1>Bem-vindo ao Nosso Projeto</h1>
                <p>Aproveite todos os recursos que oferecemos!</p>
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <a href="../pages/register.php" class="cta-button">Cadastre-se agora</a>
                <?php } else { ?>
                    <a href="../pages/profile.php" class="cta-button">Ver Perfil</a>
                <?php } ?>
            </div>
        </section>

        <section class="features">
            <div class="feature">
                <h2>Recursos Incríveis</h2>
                <p>Aproveite os recursos avançados disponíveis no nosso site.</p>
            </div>

            <div class="feature">
                <h2>Fácil de Usar</h2>
                <p>Interface simples e intuitiva, tornando a navegação fácil para todos.</p>
            </div>

            <div class="feature">
                <h2>Segurança Garantida</h2>
                <p>Protegemos seus dados e garantimos sua segurança e privacidade.</p>
            </div>
        </section>

<?php
include '../includes/footer.php';
?>

<script src="../js/script.js"></script>