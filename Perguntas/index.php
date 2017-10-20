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
		<div id="perguntainer">
			<?php
				if(isset($_SESSION['u'])){
			?>
			<div class="perg">
				<a href="prg_new.php">
					Fazer uma pergunta
				</a>	
			</div>
			<?php
				}
			?>	
			<div class="perg">
				<a href="">
					Pesquisar uma pergunta
				</a>		
			</div>
			<div class="perg">
				<a href="">
					Pesquisar uma Linguagem
				</a>	
			</div>	

			
		</div>		
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>