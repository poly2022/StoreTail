<!-- <?php //include("../DataAccessLayer/conectionBD.php")?>
<!DOCTYPE html>
<html lang="en">
   
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="css/style.css">
</head>
    <body>
    <?php
        // if(isset($_POST['btSubmit'])){
        // $flag=false;
        // $flag_email=false;
        // $flag_password=false;
        
        
        // $first_name=$_POST['first_name'];
        // $last_name=$_POST['last_name'];
        // $user_name=$_POST['user_name'];
        // $email=$_POST['email'];
        // $password=$_POST['password'];
        // $confirm_password=$_POST['confirmpassword'];
        // /* Verificar se o login já existe */
        // $query="select email from users ";
        // $result=mysqli_query($conexao,$query);
        // while($registo=mysqli_fetch_assoc($result)){
        //     $emailBD=$registo['email'];
        //     if($emailBD==$email){
        //         $flag=true;
        //         $flag_email=true;
        //         }		
        //     }
        // /* Validações */		
        // if ($password!=$confirm_password || $password=="") {$flag=true; $flag_password=true;}
        
        
        // /* Existiu um erro */
        // if($flag_password==true){ ?>
        <script> alert("Senha diferente! ")</script><?php
            ?>
            <section>
    <div class="form-container">
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
                <label for="user_name">user_name: <span class="required">*</span></label>
                <input type="text" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: <span class="required">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password: <span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword">
            </div>
            <input type="submit" class="" name="btSubmit" id="btSubmit" value="Submit" class="primary" />
            <div id="validationErrors"></div>
        </form>
    </div>
        </section>
    <?php //} 
//     else {
//         $password=password_hash($password, PASSWORD_DEFAULT);
//         $insert="INSERT INTO users  
// (user_types_id,first_name, last_name,user_name,email,password) VALUES (1,'".$first_name."','".$last_name."','".$user_name."','".$email."','".$password."')";
// $result=mysqli_query($conexao,$insert);

// if($result==1){	
// echo"<p>Parabéns $first_name! Realizou o seu registo com sucesso.</p>";
// } 

// else {
// echo "<p>Dados não inseridos!</p>";?><br><br>
// <a href="index.php" class="form-submit">Voltar ao Menu Principal</a><?php
// }
// }
// }else {
    ?>
    <div class="form-container">
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
                <label for="user_name">user_name: <span class="required">*</span></label>
                <input type="text" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: <span class="required">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password: <span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword">
            </div>
            <div class="form-group">
            
            <input type="submit" class="" name="btSubmit" id="btSubmit" value="Submit" class="primary" />
            </div>
            <div id="validationErrors"></div>
        </form>
    </div>  
 <?php //} ?> -->
    <!-- <script src="script.js"></script>
    </body>
</html> -->


<?php include("../Controller/registUserController.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet" >
 
 <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">

  <link href="css/app.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<header>

</header>
<body>
    <?php
    $userController = new UserController();

    if (isset($_POST['btSubmit'])) {
        $resultMessage = $userController->registerUser($_POST['first_name'], $_POST['last_name'], $_POST['user_name'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']);

        echo "<script>alert('$resultMessage');</script>";
    }
    ?>

    <div class="form-container">
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
                <label for="user_name">Username: <span class="required">*</span></label>
                <input type="text" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: <span class="required">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password: <span class="required">*</span></label>
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

    <script src="script.js"></script>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
