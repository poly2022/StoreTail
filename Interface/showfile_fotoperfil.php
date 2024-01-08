<?php
include ("../DataAccessLayer/conectionBD.php");
$query=" select photo_name,photo_type,photo_size,photo_data from users where id=".$_GET['id']; 
$result=mysqli_query($conexao,$query);
$row=mysqli_fetch_array($result);
$photo_type=$row["photo_type"];
$photo_name=$row["photo_name"];
$photo_size=$row["photo_size"];
$photo_data=base64_decode($row["photo_data"]);

header("Content-type:$photo_type");
header("Content-lenght:$photo_size");
header("Content-Disposition: inline; filename=$photo_name");
header ("Content-Description: PHP Generated Data");
echo $photo_data;
?>

<?php
// Inclui o arquivo de conexão com o banco de dados
include("../DataAccessLayer/conectionBD.php");

//Consultas SQL para buscar os dados da tabela 'users' com base no ID passado via GET
$query = "SELECT photo_name, photo_type, photo_size, photo_data FROM users WHERE id=" . $_GET['id'];
$result = mysqli_query($conexao, $query);

// Obtém a primeira linha do resultado como um array associativo
$row = mysqli_fetch_array($result);

// Armazena os valores retornados da consulta em variáveis
$photo_type = $row["photo_type"];
$photo_name = $row["photo_name"];
$photo_size = $row["photo_size"];
$photo_data = base64_decode($row["photo_data"]);

header("Content-type: $photo_type"); // Define o tipo do arquivo (ex: image/jpeg)
header("Content-length: $photo_size"); // Define o tamanho do conteúdo em bytes
header("Content-Disposition: inline; filename=$photo_name"); // Define o nome do arquivo a ser exibido

// Descrição do conteúdo gerado pelo PHP
header("Content-Description: PHP Generated Data");

// Exibindo os dados da imagem (conteúdo binário da imagem)
echo $photo_data;
?>
