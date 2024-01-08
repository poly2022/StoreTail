
<?php
require_once("../DataAccessLayer/conectionBD.php");
require_once("../BusinessLayer/User/UserService.php");

session_start();
$userService = new UserService($conexao);

// Obtenha os dados do perfil do usuário
$profileData = $userService->getUserProfile($_SESSION["id"]);
?>
					<script> alert($profileData)</script>
					<?php
// Define o conteúdo específico da página
ob_start(); // Inicia o buffer de saída
?>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: #f4f4f4;
}

.profile-container {
  width: 350px;
  background: white;
  margin: 20px auto;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header h1 {
  color: #FF4500;
  text-align: center;
}

.profile-picture-section {
  text-align: center;
  margin-bottom: 20px;
}

.profile-picture img {
  width: 80px; /* Placeholder size */
  height: 80px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 10px;
}

.new-picture-btn {
  background: #FF4500;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 5px 15px;
  cursor: pointer;
}

.profile-info .form-field {
  margin-bottom: 10px;
}

.profile-info label {
  display: block;
  margin-bottom: 5px;
}

.profile-info input[type="text"],
.profile-info input[type="email"] {
  width: calc(100% - 20px);
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.update-btn {
  width: 100%;
  padding: 10px;
  border: none;
  background-color: #FF4500;
  color: white;
  cursor: pointer;
  border-radius: 5px;
} 
</style>


<div class="content">
<div class="profile-container">
    <header>
        <h1>MY PROFILE</h1>
    </header>
    <section class="profile-picture-section">
    <form id="profileForm" method="POST" enctype="multipart/form-data">
        <div class="profile-picture">
     
            <img src="showfile_fotoperfil.php?id=<?php echo $_SESSION['id'];?>" width="80" height="80" alt="Profile Picture">
            <br>
            <input type="file" id="foto" name="foto">
            <input type="submit" id="btfotoprofile" name="btfotoprofile" class="new-picture-btn" value="New Picture"/>
        </div>
    </form>
</section>
    <?php
    if(isset($_POST['btperfil'])){
		$flag=false;
		$flag_email=false;
		$flag_password=false;
		
		$profileData['first_name']=$_POST['first_name'];
		$profileData['last_name']=$_POST['last_name'];
		$profileData['email']=$_POST['email'];
		


    $atualizar="UPDATE users SET first_name='{$profileData['first_name']}', last_name='{$profileData['last_name']}', email='{$profileData['email']}' WHERE id='{$_SESSION["id"]}'";
    $result=mysqli_query($conexao,$atualizar);
    if ($result) {
      ?>
      <script>
          alert('Dados atualizados com sucesso!');
          window.location.href = 'profile.php';
      </script>
  <?php
  } else {
      echo "Erro na atualização: " . mysqli_error($conexao);
  }
  }elseif(isset($_POST['btfotoprofile'])){		
    if($_FILES['foto']['error']==0){
      $file_id=mysqli_insert_id($conexao);//ultimo registo inserido na base de dados
      $file_name=$_FILES['foto']['name'];
      $file_type=$_FILES['foto']['type'];
      $file_size=$_FILES['foto']['size'];
      $file_tmp=$_FILES['foto']['tmp_name'];
      $data=base64_encode(file_get_contents($file_tmp));
      $query="update users set photo_name='".$file_name."',photo_size='".$file_size."',photo_type='".$file_type."',photo_data='".$data."'WHERE id='{$_SESSION["id"]}'";	
      $result_up=mysqli_query($conexao,$query);
     
    ?>
      <SCRIPT LANGUAGE='JavaScript'>
        window.alert('Fotografia Atualizada!')
        window.location.href='profile.php';
      </SCRIPT>		
    <?php
    }
          
  }

  ?>
    <section class="profile-info">
        <form id="profileForm" method="POST" enctype="multipart/form-data">
            <div class="form-field">
                <label for="firstname">Firstname:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $profileData['first_name']; ?>">
            </div>
            <div class="form-field">
                <label for="lastname">Lastname:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $profileData['last_name']; ?>">
            </div>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" id="user_name" name="user_name" disabled placeholder="" value="<?php echo $profileData['user_name']; ?>">
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $profileData['email']; ?>">
            </div>
            <div class="form-field">
            <input type="submit" name="btperfil" id="btperfil" value="Update" class="update-btn"/>
            </div>
            <div class="form-field">
              <a href="premium.php">Become Premium</a>
            </div>
            <div class="form-field">
            <a href="logout.php">
            <button type="button" class="btn btn-bd-primary btn-sm fs-8 btn-size" style="background-color: red;">Logout</button>
            </a>
            </div>
        </form>
    </section>
</div>
</div>
<?php
    $content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

    include('pageDefault.php'); // Inclui o arquivo da página padrão do site
?>