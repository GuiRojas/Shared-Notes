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
		<form action="logar.php" method="POST">
			<span class="campos">Nome de Usuario:</span><br>
			<input type="text" class="camposInput" name="username" maxlength="25" ><br>
			<span class="campos" type="password">Senha:</span><br>
			<input type="password" class="camposInput" name="senha" maxlength="25" ><br>
			<span class="campos"><a href="#">Esqueceu sua senha?</a></span><br>
			<span class="campos"><a href="cadastro.php">Não tem uma conta? cadastre-se aqui.</a></span><br><br>
			<input type="submit" name="Logar" id="enviar">
		</form>
	</div>


</body>
</html>