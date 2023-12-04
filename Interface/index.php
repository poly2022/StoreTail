<?php include("../DataAccessLayer/conectionBD.php");session_start();  ?>

<?php
// Define o conteúdo específico da página
ob_start(); // Inicia o buffer de saída


?>
<div class="content">

<div class="container-fluid d-flex justify-content-center align-items-center bg-body-tertiary flex-column">
      <h2 style="color: #E95A0C;" class="text-center mt-4">New Books</h2>
      <div class="container bg-white py-4 mb-4" style="max-height: 80vh; overflow-y: auto;">
        <div class="row row-cols-1 row-cols-md-4 g-4">
          <?php include("../Interface/book.php") ?>
          </div>
        </div>
      </div>
    </div>

</div>
<?php
$content = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer


if (isset($_GET['pagina'])) { 
  if ($_GET['pagina'] == 'validate_login') {;
      include("validate_login.php");
      
  }
}

if (isset($_SESSION["user_types_id"])) {
  if ($_SESSION["user_types_id"] == 1) { 
      include("pageDefault2.php");
  }
}else include("pageDefaultVisit.php");



 // Inclui o arquivo do template com o conteúdo especificado
?>


