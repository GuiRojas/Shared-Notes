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
			<?php 
			if( isset($_SESSION['u'])){
			?>
				<a href="perg_new.php">
					<div class="stockDivLight">
						<div class="stockTexto">Perguntar</div>
						<div class="linhaVertical"></div>
						<div class="stockimage"></div>
					</div>
				</a> <!-- codigo em php pra verificar se esta logado se n mandar uma mensagem bonitnha falando pra se logar-->
			<?php 
			}else{
			?> 
				<div class="stockDivLight trapPerg">
					<div class="stockTexto">Perguntar</div>
					<div class="linhaVertical"></div>
					<div class="stockimage"></div>
				</div>
			<?php
			}
			?>

				<a href="perg_pesq.php">
					<div class="stockDivDark">
						<div class="stockimage"></div>
						<div class="linhaVertical"></div>
						<div class="stockTexto">Pesquisar</div>
					</div>
				</a>
			
				<a href="perg.php">
					<div class="stockDivLight">
						<div class="stockTexto">Pesquisar uma categoria</div>
						<div class="linhaVertical"></div>
						<div class="stockimage"></div>
					</div>
				</a>

				<a href="perg.php">
					<div class="stockDivDark">
						<div class="stockimage"></div>
						<div class="linhaVertical"></div>
						<div class="stockTexto">Mais recentes</div>
					</div>
				</a>
			</div>
		</div>	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>