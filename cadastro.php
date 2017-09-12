<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>

	<form action="cadastrar.php" method="POST">
		Nome de Usuario:
		<input type="text" name="username" maxlength="15"><br>
		Senha:
		<input type="password" name="senha"><br>
		Confirmar Senha:
		<input type="password_conf" name="senha"><br>
		Email:
		<input type="text" name="email" maxlength="100"><br>
		Nome:
		<input type="text" name="nome" maxlength="50"><br>

		<input type="submit" name="Cadastrar">
	</form>

</body>
</html>