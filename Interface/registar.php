<?php include("../Controller/registUserController.php"); ?>

<?php
// Define o conteúdo específico da página
ob_start(); // Inicia o buffer de saída
?>

<div class="content">
    <?php
    $userController = new UserController($conexao);

    if (isset($_POST['btSubmit'])) {
        $resultMessage = $userController->registerUser($_POST['first_name'], $_POST['last_name'], $_POST['user_name'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']);

        echo "<script>alert('$resultMessage');</script>";
    }
    ?>


    <div class="form-container">
    <div class="text-center mb-5">
        <img src="../Interface/img/storytail-logo-02.png" alt="Logo da Empresa" style="width: 200px; border-radius: 4px">
    </div>
        <form id="registrationForm" action="" method="post">
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input type="text" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input type="text" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="user_name">Username: <span class="required"></span></label>
                <input type="text" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: <span class="required"></span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password: <span class="required"></span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword">
            </div>

            <div class="form-group">
                <input type="submit" class="styled-submit-btn" name="btSubmit" id="btSubmit" value="Submit" class="primary" />
            </div>
            <div id="validationErrors"></div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

include('pageDefaultMenu.php'); // Inclui o arquivo da página padrão do site
?>