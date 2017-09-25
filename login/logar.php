<!DOCTYPE html>
<html>
<head>
	<title>Logando...</title>
</head>
<body>

<?php

	if(isset($_POST['username'])&&isset($_POST['senha'])){
		include("../Include/connect.inc.php");

		$username=$_POST['username'];
		$senha=$_POST['senha'];

		$sql="SELECT * from usuario where username='$username'";

		$status=sqlsrv_query($conexao,$sql);

		if($dados=sqlsrv_fetch_array($status)){
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
			
			echo "Usuario inexistente";
		}
		echo "<hr>";
		echo "<a href='login.php'>";
		echo "<input type='button' class='retornar' value='Retornar'> </a>";
				

	}

?>



</body>
</html>