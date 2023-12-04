
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
        <div class="profile-picture">
            <img src="default-profile.png" width="80" height="80" alt="Profile Picture">
            <br>
            <button class="new-picture-btn">new picture</button>
        </div>
    </section>
    <section class="profile-info">
        <form id="profileForm">
            <div class="form-field">
                <label for="firstname">Firstname:</label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $profileData['first_name']; ?>">
            </div>
            <div class="form-field">
                <label for="lastname">Lastname:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $profileData['last_name']; ?>">
            </div>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" disabled placeholder="" value="<?php echo $profileData['user_name']; ?>">
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $profileData['email']; ?>">
            </div>
            <div class="form-field">
            <button type="submit" class="update-btn">update</button>
            </div>
            <div class="form-field">
            <a href="logout.php"
            <button type="button" class="btn btn-bd-primary btn-sm fs-8 btn-size" style="background-color: red;">Logout</button>
            </a>
            </div>
        </form>
    </section>
</div>
</div>
<?php
    $content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

    include('pageDefault.php'); // Inclui o arquivo do template com o conteúdo especificado
?>