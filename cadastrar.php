<!DOCTYPE html>
<html>
<head>
	<title>Criando usuario...</title>
</head>
<body>

<?php
		include("connect.inc.php");
		if(isset($_POST['username'])&&isset($_POST['senha'])&&isset($_POST['senha_conf'])&&isset($_POST['email'])&&isset($_POST['nome'])){

			if($_POST['senha']===$_POST['senha_conf']){

				$username=$_POST['username'];
				$senha=$_POST['senha'];
				$email=$_POST['email'];
				$nome=$_POST['nome'];

				$stored_pass=password_hash($senha,PASSWORD_BCRYPT,array(
								'cost'=>10
							 ));

				$sql = "INSERT INTO usuario values ('$username','$email','$nome','$stored_pass')";

				$status=sqlsrv_query($conexao,$sql);
				
				if($status){
					echo "Inclusão realizada perfeitamente bem";
				}else{
					echo "Não foi possivel realizar a inclusão";
				}

			}else{
				echo "Senha difere da confirmação"; 
			}

		}else{
			echo "Preencha o formulário inteiro";
		}

	?>



</body>
</html>