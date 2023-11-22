<?php
$servername = "localhost";
$database = "store_tail";
$username = "root";
$password = "";

$conexao = new mysqli($servername, $username, $password, $database);
if ($conexao->connect_errno) {
  echo "Falha ao conectar: (" . $conexao->connect_errno . ")" . $conexao->connect_error;
}
else
"Conectado!";