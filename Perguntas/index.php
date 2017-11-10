<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Perguntas</title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		$titulo= "Perguntas";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
		
	<div id="container">
		<div id="home">

			<div class="stockDivLight trapPerg">
				<div class="stockTexto">Perguntar</div>
				<div class="stockimage">
					<br>
						<span class="fodasse">•algo</span><br><br>
						<span class="fodasse">•algo</span>
				</div>
			</div>

			<a href="perg_pesq.php">
				<div class="stockDivDark">
					<div class="stockimage">
						<br>
						<span class="fodasse">•algo</span><br><br>
						<span class="fodasse">•algo</span>
					</div>
					<div class="stockTexto">Pesquisar</div>
				</div>
			</a>

		</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>