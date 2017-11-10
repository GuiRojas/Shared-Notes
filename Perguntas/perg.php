<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "Perfis"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>	
	<?php
		if (isset($_GET['query'])){ // inicio do if
			$titulo = $_GET['query'];
			include '../Include/getPergData.inc.php';
			//include '../Include/getrRespData.inc.php';
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
			
	?>
		<div id="container">
			<h3><i><?php echo "$cat"; ?></i></h3> <br>

			<div id="pergunta">
				<div id="post">
					<img src=<?php echo "../Perfis/" . $urlFoto ?> class='imgPergunta'>
					<?php
						echo "<form align = 'center'> $manchete </form><br>";
					?>

					<div id="textoPerg">
						<?php
							echo "$texto";
						?>
					</div>
					<div class="criadorPergunta"><?php echo "$criadorPerg"; ?></div>						
				</div>
			</div>
			<div id="resposta">
				
			</div>
		</div>
	<?php
		} //fim do if
		else{
			$titulo = '';
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
		}
		include '../Include/bot.inc.php';
	?>
</body>
</html>