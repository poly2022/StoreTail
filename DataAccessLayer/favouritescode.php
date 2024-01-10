<?php
require_once("../DataAccessLayer/conectionBD.php");
require_once("../BusinessLayer/User/UserService.php");

// Inicia a sessão (se ainda não estiver iniciada)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cria uma instância de UserService com a conexão da bd
$userService = new UserService($conexao);

// Obtém os dados do perfil do utilizador
$profileData = $userService->getUserProfile($_SESSION["id"]);
?>
<!-- <script> alert(<?php echo json_encode($profileData); ?>);</script> -->

<?php

function getFavoriteBooks($conexao, $users_id) {
    try {
        // Ensure $userId is an integer to prevent SQL injection
        $users_id = intval($users_id);

        // Consulta SQL para selecionar os livros favoritos do utilizador a partir do ID da sessão
        $query = "
            SELECT books.*
            FROM book_user_favourites
            JOIN books ON book_user_favourites.books_id = books.book_id
            WHERE book_user_favourites.users_id = $users_id
        ";

        // Executa a consulta
        $result = $conexao->query($query);

        if (!$result) {
            throw new Exception("Erro na consulta: " . $conexao->error);
        }

        // Busca todas as linhas como um array associativo
        $favoriteBooks = $result->fetch_all(MYSQLI_ASSOC);

        return $favoriteBooks;
    } catch (Exception $e) {
        // Trata erros, se necessário
        echo "Erro: " . $e->getMessage();
        return false;
    }
}

?>