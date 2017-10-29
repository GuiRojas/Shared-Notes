<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "Projeto"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
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
			<p class="tituloProjNew">Título:</p><input class="respProjNew" type="text" name="titulo" maxlength="30"><br>
			<p class="tituloProjNew">Descrição:</p><textarea class="respProjNew" type="text" name="descricao"></textarea><br>
			<p class="tituloProjNew">Nota do criador:</p> <input class="respProjNew" type="text" name="perg" id="perg"><br><br>
			<input type="file" name="" value="escolher arquivo"><br><br>
			<input type="submit" name="Logar" id="enviar">
		</form>
	</div>

	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>