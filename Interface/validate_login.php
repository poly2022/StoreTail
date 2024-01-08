<?php
	// Obtém os dados de login do formulário via método POST
	$user_name=$_POST['user_name'];
	$password=$_POST['password'];

	// Consulta SQL para procurar um usuário com o nome de usuário fornecido
	$procura="select * from users where user_name='".$user_name."';";
	$result=mysqli_query($conexao,$procura);

	if ($result) {
		$nregistos=mysqli_num_rows($result); // Obtém o número de registros encontrados
		$registo=mysqli_fetch_assoc($result); // Obtém os dados do primeiro registro encontrado
	
				$passwordbd=$registo["password"]; // Obtém a senha armazenada no banco de dados para o usuário encontrado
				if(password_verify($password,$passwordbd)) {
					// Se as senhas coincidirem, configura as variáveis para indicar que o login bem-sucedido
					$_SESSION["id"]=$registo["id"];
					$_SESSION["login_status"]=1;
					$_SESSION["user_name"]=$registo["user_name"];
					$_SESSION["user_types_id"]=$registo["user_types_id"];
					?>
					<script> alert("Login Successfully")</script>
					<?php
				}else { ?>
						<script> alert("Wrong Password")</script><?php
					}
			
	}else { ?>
		<!-- Se a consulta não retornar nenhum resultado, indica que o login é incorreto -->
		<script> alert("Incorrect Login")</script><?php	
				
		}

?>