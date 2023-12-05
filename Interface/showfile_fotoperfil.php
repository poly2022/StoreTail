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