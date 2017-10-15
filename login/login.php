<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>SN - Login</title>
	<link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		include '../include/tituloCadastro.inc.php'
	?>
	<h1>Login</h1>
	<div id="cadastro">
		<form action="login.php" method="POST">
			<span class="campos">Nome de Usuario:</span><br/>
			<input type="text" class="camposInput" name="username" maxlength="25" ><br/>
			<span class="campos" type="password">Senha:</span><br/>
			<input type="password" class="camposInput" name="senha" maxlength="25" ><br/>
			<span class="campos"><a href="#">Esqueceu sua senha?</a></span><br/>
			<span class="campos"><a href="cadastro.php">Não tem uma conta? cadastre-se aqui.</a></span><br>

		<?php
			if(isset($_POST['username'])&&isset($_POST['senha'])){
			include("../Include/connect.inc.php");

			$username=$_POST['username'];
			$senha=$_POST['senha'];

			$sql=("login_sp '".$username."'");

			$status=sqlsrv_query($conexao,$sql);

			if($dados=sqlsrv_fetch_array($status)){
				$pass_verf=$dados[3];
				if(password_verify($senha,$pass_verf)){
					session_start();
					$_SESSION['perfilVisitando'] = $username;
					$_SESSION['u'] = $username;
					header('Location:../Home/index.php');
				}else{
					echo '<span class="campos" id="msgErro">Senha errada</span><br>';
				}
			}else
				echo '<span class="campos" id="msgErro">Usuario inexistente</span><br>';
			}

		?>

		<input type="submit" name="Logar" id="enviar">
		</form>
	</div>


</body>
</html>