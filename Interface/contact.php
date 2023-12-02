<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $to = 'seu-email@exemplo.com'; // Substitua pelo seu endereço de e-mail
        $assunto = 'Nova mensagem do formulário de contato';
        $corpo_mensagem = "Nome: $nome\n";
        $corpo_mensagem .= "Email: $email\n";
        $corpo_mensagem .= "Mensagem:\n\n$mensagem";

        // Enviar e-mail
        mail($to, $assunto, $corpo_mensagem);

        echo "<script> 
                    window.location.href='./index.php';
                     alert(' SUCESSO - Sua mensagem foi enviado com sucesso.'); 
                 </script>";
        exit;
    }
?>

<?php
    
    ob_start();
?>
<div class="content">
    <h3>Contact us</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mensagem">Menssage:</label><br>
        <textarea id="mensagem" name="mensagem" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</div>
<?php
    $content = ob_get_clean();

    include('pageDefault.php');
?>