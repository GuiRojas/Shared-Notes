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
		$titulo= "Projetos";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
	<div id="container">
		<?php
				if(isset($_SESSION['u'])){
			?>
			<div class="proj">
				<a href="projNew.php">
					Postar um projeto
				</a>	
			</div>
			<?php
				}
			?>	
			<div class="proj">
				<a href="projPesq.php">
					Pesquisar um projeto
				</a>		
			</div>
	</div>

	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>