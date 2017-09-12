<!DOCTYPE html>
<html>
<head>
	<title>Criando usuario...</title>
</head>
<body>

<?php
		include("connect.inc.php");
		if(isset($_POST['username'])&&isset($_POST['senha'])&&isset($_POST['email'])&&isset($_POST['nome'])){

			$username=$_POST['username'];
			$senha=$_POST['senha'];
			$email=$_POST['email'];
			$nome=$_POST['nome'];

			$stored_pass=password_hash($senha,PASSWORD_BCRYPT,array(
							'cost'=>10
						 ));

			$sql = "INSERT INTO usuario values ('$username','$email','$nome','$stored_pass')";
			echo $sql;

			$status=sqlsrv_query($conexao,$sql);
			
			if($status){
				echo "Inclusão realizada perfeitamente bem";
			}else{
				echo "Deu não filhotão";
			}

		}else{
			echo "Preenche o formulario dnv bb"; 
		}


	?>



</body>
</html>