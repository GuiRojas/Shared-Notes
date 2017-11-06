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
		if ( isset($_GET['query'])){ // inicio do if
			$tituloProj = $_GET['query'];
			include '../Include/getProjData.inc.php';
			$titulo= "$tituloProj";
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
		}
	?>

	<div id="container">
		<div id="home">
			<div style="margin:50px;">
				<h1 class="infProj">Descrição:</h1>
				<div>
					<span><?php echo "$descricao"; ?></span>
				</div>

				<h1 class="infProj">Notas do criador:</h1>
				<div>
					<span><?php
					if( trim($nota) != ""){
						echo "$nota.";
					}else{
						echo "Sem notas do criador.";
					}
					?></span>
				</div>
				<a class="download" href='<?php echo"$nomeArquivo" ?>' download> Baixar</a>
			</div>
		</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>