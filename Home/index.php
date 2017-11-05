<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		$titulo = "Home";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
		
	<div id="container">
		<div id="home">
			<a href="../Perfis/perfilMenu.php" style="text-decoration:none">
				<div class="stockDivLight">
					<div class="stockTexto">Procure por outras pessoas</div>
					<div class="linhaVertical"></div>
					<div class="stockimage"></div>
				</div>
			</a>
			
			<a href="../Perguntas/index.php" style="text-decoration:none">
				<div class="stockDivDark">
					<div class="stockimage"></div>
					<div class="linhaVertical"></div>
					<div class="stockTexto">Pergunte ou responda</div>
				</div>
			</a>
			
			<a href="../projetos/index.php" style="text-decoration:none">
				<div class="stockDivLight"><!--vai pro perfil da pessoa, se n tiver logada, abre o login-->
					<div class="stockTexto">Compartilhe seus projetos</div>
					<div class="linhaVertical"></div>
					<div class="stockimage"></div>
				</div>
			</a>

		</div>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>