<?php include("../DataAccessLayer/conectionBD.php") ?>

<?php
    // Define o conteúdo específico da página
    ob_start(); // Inicia o buffer de saída
    
?>
<div class="content">

<div class="form-container">
<div class="text-center mb-5">
        <img src="../Interface/img/storytail-logo-02.png" alt="Logo da Empresa" style="width: 200px; border-radius: 4px">
    </div>
    <form action="index.php?pagina=validate_login" id="loginForm" method="POST">
            <div class="form-group">
                <label for="username">Username: <span class="required"></span></label>
                <input type="text" id="user_name" name="user_name" required>
            </div>

            <div class="form-group">
                <label for="password">Password: <span class="required"></span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password">
            </div> -->
            <div class="form-group">
                <h9><a href="registar.php">Register Here</a></h9>
            </div>
            <button class="styled-submit-btn" type="submit">Submit</button>
            <div id="validationErrors"></div>
        </form>
    </div>
</div>
<?php
    $content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

    include('pageDefaultMenu.php'); // Inclui o arquivo do template com o conteúdo especificado
?>