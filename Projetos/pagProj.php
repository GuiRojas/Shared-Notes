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
		<?php 
			if( isset($_SESSION['projPostado']) && $_SESSION['projPostado']){
				?>
					<script type="text/javascript"> myAlert("Projeto postado com sucesso!");</script>
				<?php
				$_SESSION['projPostado'] = false;
			}

		?>
		<div id="home">
			<div style="margin:10px 90px; ">
				<h1 class="infProj">Descrição:</h1>
				<div>
					<p class="shoBob"><?php echo "$descricao"; ?></p>
				</div>
				<hr>
				<h1 class="infProj">Notas do criador:</h1>
				<div>
					<p class="shoBob"><?php
					if( trim($nota) != ""){
						echo "$nota.";
					}else{
						echo "Sem notas do criador.";
					}
					?></p>
				</div><hr><br><br>
				<a class="download" href='<?php echo"$nomeArquivo" ?>' download> Baixar</a>
			</div>
		</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>