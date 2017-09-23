<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
</head>
<body>
	<?php
		include '../include/tituloCadastro.inc.php'
	?>
		<h1>Login</h1>
	<div id="cadastro">
		<form action="cadastrar.php" method="POST">
			<span class="campos">Nome de Usuario:</span><br>
			<input type="text" class="camposInput" name="username" maxlength="25" ><br>
			<span class="campos" type="password">Senha:</span><br>
			<input type="password" class="camposInput" name="senha" maxlength="25" ><br>
			<span class="campos"><a href="#">Esqueceu sua senha?</a></span><br>
			<span class="campos"><a href="cadastro.php">Não tem uma conta? cadastre-se aqui.</a></span><br><br>
			<input type="submit" name="Logar" id="enviar">
		</form>
	</div>

	<?php

	if(isset($_GET['username'])&&isset($_GET['senha'])){
		include("../Include/connect.inc.php");

		$username=$_GET['username'];
		$senha=$_GET['senha'];

		$sql="SELECT * from usuario where username='$username'";

		$status=sqlsrv_query($conexao,$sql);

		if($dados=sqlsrv_fetch_array($status)){
			echo "<hr>";
			$pass_verf=$dados[3];
			if(password_verify($senha,$pass_verf)){
				session_start();
				$_SESSION['perfilVisitando']=$username;
				$_SESSION['user']=$username;
				header('Location:../Home/index.php');
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