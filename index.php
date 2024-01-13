<!-- Código JavaScript para redirecionamento automático -->
<script>
    // Função para redirecionar após um intervalo de tempo (em milissegundos)
    function redirectAfterTime(url, time) {
        setTimeout(function () {
            window.location.href = url;
        }, time);
    }

    // Redirecionar para a página de login após 5 segundos (5000 milissegundos)
    redirectAfterTime("./pages/index.php", 0); // Redirecionar após 5 segundos
</script>