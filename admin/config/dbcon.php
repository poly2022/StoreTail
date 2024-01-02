<?php
$host = "localhost";
$database = "store_tail";
$username = "root";
$password = "";

$con = mysqli_connect("$host", "$username", "$password", "$database");
if (!$con) 
{
  header("Location: ../errors/db.php");
  die();
}
else
  echo "Database Connected!"
?>