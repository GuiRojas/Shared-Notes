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
		<div id="areaFrm">
			<form method="POST" id="formProj">
				<div class="tituloProjNew"> <p class="tlt">Título:</p></div><input class="respProjNew" type="text" name="titulo" maxlength="30" autofocus="true"><br><br>
				<div class="tituloProjNew"> <p class="tlt">Descrição:</p></div><textarea class="respProjNew" type="text" name="descricao"></textarea><br><br>
				<div class="tituloProjNew"> <p class="tlt">Nota do criador:</p></div> <input class="respProjNew" type="text" name="perg" id="perg"><br><br>
				<div class="tituloProjNew"> <p class="tlt">Arquivo:</p></div>
				<input style="margin-left: 10px;" type="file" accept=".txt, .zip, .rar, .js, .html, .php" name="" value="escolher arquivo"><br><br>

				<input type="submit" name="Postar" id="env">
			</form>
		</div>
	</div>

	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>