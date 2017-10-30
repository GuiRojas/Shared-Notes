<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Perguntas Recentes</title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
	<style type="text/css">
	</style>
</head>
<body>
	<?php
		$titulo= "Perguntas recentes";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
	<div id="container">
		<?php 
			include'../Include/getPergData.inc.php';
		?>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>