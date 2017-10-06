<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
</head>
<body>
	<?php
		include '../include/tituloCadastro.inc.php';
		$entrouAgr = 0;
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

			<span class="campos"><a href="login.php">Já tem uma conta? Entre aqui.</a></span><br><br>	

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

				$sql = ("criarUsu_sp '".$username."','".$email."','".$nome."','".$stored_pass."'");

				$status=sqlsrv_query($conexao,$sql);
				
				if($status){
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

		}elseif ($entrouAgr != 0) {
			echo '<span class="campos" id="msgErro">Preencha o formulário inteiro</span>';
		}
		else
			$entrouAgr = 1;

		?> <br>

			<input type="submit" name="Cadastrar" id="enviar">
		</form>
	</div>
	

	<?php


		include '../Include/bot.inc.php';
	?>

</body>
</html>