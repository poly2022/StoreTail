<?php
// $servername = "localhost";
// $database = "store_tail";
// $username = "root";
// $password = "";

// $conexao = new mysqli($servername, $username, $password, $database);
// if ($conexao->connect_errno) {
//   echo "Falha ao conectar: (" . $conexao->connect_errno . ")" . $conexao->connect_error;
// }
// else
// "Conectado!";
?>
<?php
session_start();
$host = "localhost";
$user = "root";
$pwd = "";
$db = "store_tail";
$conexao = mysqli_connect($host, $user, $pwd) or die ("Não consegui fazer a conexão a base de dados");
mysqli_select_db($conexao,$db);

?>