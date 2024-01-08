
<?php
// Inclui arquivos necessários para conexão com o banco de dados e acesso aos users
require_once("../DataAccessLayer/conectionBD.php");
require_once("../BusinessLayer/User/UserService.php");

session_start();
$userService = new UserService($conexao);

// Obtém os dados do perfil do usuário
$profileData = $userService->getUserProfile($_SESSION["id"]);
?>
					<script> alert($profileData)</script>

<?php
if(isset($_POST['buybtn']))
{
    // Obtém o ID do usuário da sessão
    $user_id = $_SESSION['id'];


    // Query para inserir uma nova inscrição na tabela 'subscriptions'
    $subscriptions_query = "INSERT INTO subscriptions (users_id) VALUES ('$user_id')";
    $subscriptions_query_run = mysqli_query($conexao, $subscriptions_query);

    if($subscriptions_query_run)
    { 
      ?>
        <!-- Alerta indicando que a inscrição foi realizada com sucesso e redirecionando para página de premium -->
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