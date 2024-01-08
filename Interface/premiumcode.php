
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
if(isset($_POST['buybtn']))
{
    $user_id = $_SESSION['id'];


    $subscriptions_query = "INSERT INTO subscriptions (users_id) VALUES ('$user_id')";
    $subscriptions_query_run = mysqli_query($conexao, $subscriptions_query);

    if($subscriptions_query_run)
    { 
      ?>
        <script> alert("Subscribed Successfully")
        window.location.href = "premium.php";</script>
        <?php
        $_SESSION['status'] = "Subscribed Successfully";
       

    }
    else
    {   
        $_SESSION['status'] = "Subscription Failed";
        header("Location: premium.php");
    }
}




?>