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
			$titulo = $_GET['query'];
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';

			$nomePerg = $_GET['query'];
			include '../Include/getPergData.inc.php';
		}
		else {
			$titulo = '';
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
		}
	?> 
	<div id="container">
		
			<div id='profilePosts'>
			</div>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>