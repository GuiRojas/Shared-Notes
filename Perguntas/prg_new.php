<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Perguntas</title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
	<style type="text/css">
		#perg
		{
		height:200px;
		width: 500px;
		}
		#formPerg
		{
		margin-left: 20px;
		}
	</style>
</head>
<body>
	<?php
		$titulo= "Perguntas";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
		
	<div id="container">
		
		<form method="POST" action="new.php" id="formPerg">
			Título:<br><input type="text" name="titulo" maxlength="100"><br>
			Categoria:<input type="text" name="cat"><br><br>
			Pergunta:<br><input type="text" name="perg" id="perg"><br>
			<br><br>
			<input type="submit" name="Logar" id="enviar">	
						
		</form>

	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>