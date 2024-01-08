<?php
// Verifica se o formulário foi submetido via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Configuração do e-mail de destino e conteúdo da mensagem
    $to = 'seu-email@exemplo.com'; // Substitua pelo seu endereço de e-mail
    $assunto = 'Nova mensagem do formulário de contato';
    $corpo_mensagem = "Nome: $nome\n";
    $corpo_mensagem .= "Email: $email\n";
    $corpo_mensagem .= "Mensagem:\n\n$mensagem";

    // Envia o e-mail
    mail($to, $assunto, $corpo_mensagem);

    // Redireciona de volta para 'index.php' e exibe um alerta de sucesso
    echo "<script> 
            window.location.href='./index.php';
            alert('SUCESSO - Sua mensagem foi enviada com sucesso.'); 
          </script>";
    exit;
}
?>

<style>
    /* Estilos CSS */
    #mensagem {
        width: 100%;
        /* Define a largura da caixa de texto como 100% do seu contêiner */
        resize: vertical;
        /* Permite redimensionar verticalmente apenas */
    }
</style>

<?php

// Inicia o buffer de saída
ob_start();
?>
<div class="content">
    <div class="text-center mb-5">
        <img src="../Interface/img/storytail-logo-02.png" alt="Logo da Empresa" style="width: 200px; border-radius: 4px">
    </div>
    <h3>Contact us</h3>
    <!-- Formulário de contato -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mensagem">Message:</label><br>
        <textarea id="mensagem" name="mensagem" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</div>
<?php
// Captura o conteúdo do buffer de saída e limpa o buffer
$content = ob_get_clean();

// Inclui o conteúdo gerado em 'pageDefault.php'
include('pageDefault.php');
?>