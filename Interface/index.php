<?php include("../DataAccessLayer/conectionBD.php"); // Inclui o arquivo de conexão com o banco de dados
session_start();  // Inicia a sessão
?>

<?php
// Define o conteúdo específico da página
ob_start(); // Inicia o buffer de saída
?>
<div class="content">
    <div class="container-fluid d-flex justify-content-center align-items-center bg-body-tertiary flex-column">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php include("../Interface/book.php") ?> <!-- Inclui o arquivo que mostra a lista de livros -->
        </div>
    </div>
</div>
<?php
$content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

// Verifica parâmetros GET e inclui os arquivos das páginas com base nesses parâmetros
if (isset($_GET['pagina'])) { 
    if ($_GET['pagina'] == 'validate_login') {
        include("validate_login.php"); // Inclui o arquivo de validação de login
    }
}

// Verifica o tipo de usuário na sessão e inclui os arquivos das páginas de cada tipo
if (isset($_SESSION["user_types_id"])) {
    if ($_SESSION["user_types_id"] == 1 || $_SESSION["user_types_id"] == 2) { 
        include("pageDefault2.php"); // Inclui o arquivo de página padrão para usuários de tipo 1 ou 2
    }
} else {
    include("pageDefaultVisit.php"); // Inclui o arquivo de página padrão para visitantes
}
?>
