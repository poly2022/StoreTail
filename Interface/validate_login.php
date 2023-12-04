<?php
	
	$user_name=$_POST['user_name'];
	$password=$_POST['password'];
	$procura="select * from users where user_name='".$user_name."';";
	$result=mysqli_query($conexao,$procura);
	if ($result) {
		$nregistos=mysqli_num_rows($result);
		$registo=mysqli_fetch_assoc($result);
	
				$passwordbd=$registo["password"];
				if(password_verify($password,$passwordbd)) {
					$_SESSION["id"]=$registo["id"];
					$_SESSION["login_status"]=1;
					$_SESSION["user_name"]=$registo["user_name"];
					$_SESSION["user_types_id"]=$registo["user_types_id"];
					?>
					<script> alert("Login")</script>
					<?php
				}else { ?>
						<script> alert("Senha incorreta ")</script><?php
					}
			
	}else { ?>
			<script> alert("Login incorreto ")</script><?php	
				
			}

?>