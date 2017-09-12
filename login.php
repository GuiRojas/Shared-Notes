<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form>
		Nome de Usuario:
		<input type="text" name="username" maxlength="15"><br>
		Senha:
		<input type="password" name="senha"><br>

		<input type="submit" name="Logar">		

	</form>

	<?php

	if(isset($_GET['username'])&&isset($_GET['senha'])){
		include("connect.inc.php");

		$username=$_GET['username'];
		$senha=$_GET['senha'];

		$sql="SELECT * from usuario where username='$username'";

		$status=sqlsrv_query($conexao,$sql);

		if($dados=sqlsrv_fetch_array($status)){
			echo "<hr>";
			$pass_verf=$dados[3];
			if(password_verify($senha,$pass_verf)){
				echo 'senha correta';
			}else{
				echo 'senha errada';
			}
		}else{
			echo "<hr>";
			echo "Usuario inexistente";
		}

	}

?>


</body>
</html>