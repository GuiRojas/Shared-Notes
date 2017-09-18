<!DOCTYPE html>
<html>
<head>
	<title>Criando usuario...</title>
</head>
<body>

<?php
		include("../Include/connect.inc.php");
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

				$sql2 = "INSERT INTO pagUsuario values ('$username','Sem status','nada',0,0,'null.png',0)";

				$status2=sqlsrv_query($conexao,$sql2);
				
				if($status&&$status2){
					//TENTAREI fazer um sistema de criar paginas aqui no cadastro 
					//Se der merda, desculpe 

					$sql = "SELECT username FROM pagUsuario WHERE username = '$username';";
					$status=sqlsrv_query($conexao,$sql);

					$filename="Perfis/$username.php";
					$fp=fopen($filename,'w');

					fwrite($fp,'aaa teste');

					fclose($fp);

				header('Location:login.php');
				}else{
					$status=sqlsrv_query($conexao,$sql);
					echo "Não foi possivel realizar a inclusão";
					echo "<a href='cadastro.php'>";
					echo "<input type='button' class='retornar' value='Retornar'> </a>";
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