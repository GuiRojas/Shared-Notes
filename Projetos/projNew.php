<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "Projeto"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		$titulo= "Postar um projeto";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
	<div id="container">
		<form method="POST" id="formProj">
			Título:<br><input type="text" name="titulo" maxlength="30"><br><br>
			Descrição:<br><textarea type="text" name="descricao"></textarea><br><br>
			Nota do criador:<br><input type="text" name="perg" id="perg"><br><br>
			<input type="submit" name="Logar" id="enviar">
		</form>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>