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
		$titulo= "Projetos";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
	<div id="container">
		<div id="home">

			<?php 
			if( isset($_SESSION['u'])){
			?>
			<a href="projNew.php">
				<div class="stockDivDark">
					<div class="stockTexto">Postar um projeto</div>
					<div class="linhaVertical"></div>
					<div class="stockimage"></div>
				</div>
			</a>
			<?php
			} else{
			?>
				<div class="stockDivDark trapProj">
					<div class="stockTexto">Postar um projeto</div>
					<div class="linhaVertical"></div>
					<div class="stockimage"></div>
				</div>
			<?php
			}
			?>

			<a href="projPesq.php">
				<div class="stockDivLight">
					<div class="stockimage"></div>
					<div class="linhaVertical"></div>
					<div class="stockTexto">Pesquisar um projeto</div>
				</div>
			</a>
		
			<a href="projPesq.php">
				<div class="stockDivDark">
					<div class="stockTexto">Mais relevantes</div>
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