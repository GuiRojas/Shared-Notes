<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
</head>
<body>
	<?php
		include '../include/tituloCadastro.inc.php'
	?>
	
	<h1>Cadastro</h1>
	<div id="cadastro">
		<form action="cadastro.php" method="POST">
			<span class="campos">Nome de Usuario:</span><br>
			<input class="camposInput" type="text" name="username" maxlength="25" ><br>
			<span class="campos">Senha:</span><br>
			<input class="camposInput" type="password" name="senha" ><br>
			<span class="campos">Confirmar senha:</span><br>
			<input class="camposInput" type="password" name="senha_conf" ><br>
			<span class="campos">Email:</span><br>
			<input class="camposInput" type="text" name="email" maxlength="100"><br>
			<span class="campos">Nome:</span><br>
			<input class="camposInput" type="text" name="nome" maxlength="50" ><br>

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
					session_start();
					$_SESSION['user']=$username;
					header('Location:../Home/index.php');
				}else{
					$status=sqlsrv_query($conexao,$sql);
					echo '<span class="campos" id="msgErro">Não foi possivel realizar a inclusão</span>';
				}

			}else{
				echo '<span class="campos" id="msgErro">Senha difere da confirmação</span>'; 
			}

		}else
			echo '<span class="campos" id="msgErro">Preencha o formulário inteiro</span>';

		?> <br>

			<span class="campos"><a href="login.php">Já tem uma conta? Entre aqui.</a></span><br><br>

			<input type="submit" name="Cadastrar" id="enviar">
		</form>
	</div>
	

	<?php


		include '../Include/bot.inc.php';
	?>

</body>
</html>