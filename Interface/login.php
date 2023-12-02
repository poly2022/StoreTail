<!--<!doctype html>
<html>
<html lang="en">
     <head> 
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Form</title>
<link href="../css/style.css" rel="stylesheet">


</head> 
<body>
     <div class="form-container">
         <form>
             <input type="text" name="username" placeholder="Username" required> 
             <input type="email" name="email" placeholder="Email" required> 
             <input type="text" name="firstname" placeholder="Firstname" required> 
             <input type="text" name="lastname" placeholder="Lastname" required>
             <input type="password" name="password" placeholder="Password" required>
             <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
            <input type="button" name="submit">
</form>
</html>

-->

<?php include("../DataAccessLayer/conectionBD.php") ?>

<?php
    // Define o conteúdo específico da página
    ob_start(); // Inicia o buffer de saída
?>
<div class="content">
<div class="form-container">
        <form action="index.php?validate_login.php" id="loginForm" method="POST">
            <div class="form-group">
                <label for="username">Username: <span class="required">*</span></label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password: <span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password">
            </div>
            <div class="form-group">

                <h5><a href="registar.php">Register Here</a></h5>

            </div>
            <button type="submit">Submit</button>
            <div id="validationErrors"></div>
        </form>
    </div>
</div>
<?php
    $content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

    include('headerFooter.php'); // Inclui o arquivo do template com o conteúdo especificado
?>