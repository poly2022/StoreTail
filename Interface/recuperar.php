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
    <form action="../reset_pass/processa_envio.php"  method="POST">
            <div class="form-group">
                <label for="username">Email: <span class="required"></span></label>
                <input type="email" id="email" name="email" required="">
            </div>

         
            
          
            <input class="styled-submit-btn" name="recoverPassword" id="recoverPassword" type="submit" value="Recover"></button>
            <div id="validationErrors"></div>
        </form>
    </div>
</div>
<?php
    $content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

    include('pageDefaultMenu.php'); // Inclui o arquivo do template com o conteúdo especificado
?>