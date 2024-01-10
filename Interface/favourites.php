<?php
require_once("../DataAccessLayer/conectionBD.php");
require_once("../BusinessLayer/User/UserService.php");
require_once("../DataAccessLayer/favouritescode.php");

// Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userService = new UserService($conexao);

// Obtenha os dados do perfil do utilizador
$profileData = $userService->getUserProfile($_SESSION["id"]);
$users_id = $profileData;
// Define o conteúdo específico da página
ob_start(); // Inicia o buffer de saída
?>

<div class="content">
    <div class="container-fluid d-flex justify-content-center align-items-center bg-body-tertiary flex-column">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $favoriteBooks = getFavoriteBooks($conexao, $users_id);
            if ($favoriteBooks !== false) {
                // Output for debugging
                echo "<pre>";
                print_r($favoriteBooks);
                echo "</pre>";
            foreach ($favoriteBooks as $book) {
                ?>  
             
                <div class="col h-80">
                    <div class="card h-80 border-0">
                        <!-- Exibe a capa do livro -->
                        <div style="height: 250px; overflow: hidden;">
                            <img src="<?php echo $book['cover_url']; ?>" class="card-img-top img-fluid" style="object-fit: cover; height: 100%;" alt="...">
                        </div>
                        <!-- Rodapé da carta contendo o título do livro -->
                        <div class="card-footer" style="background-color: rgba(0, 0, 0, 0.5); color: white; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                            <small class="text-body-secondary"><?php echo $book['title']; ?></small>
                        </div>

                    </div>
                </div>
                <?php
            }
        }else {
                echo "Error retrieving favorite books.";
            }
            ?>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

include('pageDefault.php'); // Inclui o arquivo da página padrão do site
?>
