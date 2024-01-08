<?php


	session_start();
	session_destroy (); //Destrói todos os dados registrados na sessão.
	header("location: index.php"); //Redireciona o usuário para a página principal após destruir a sessão.
	
?>