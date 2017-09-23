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
		<form action="cadastrar.php" method="POST">
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

			<input type="submit" name="Cadastrar" id="enviar">
		</form>
	</div>
	
	<?php 
		include '../Include/bot.inc.php';
	?>

</body>
</html>