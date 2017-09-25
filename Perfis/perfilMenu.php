<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php	
		$titulo= "Procurar perfis";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>

	<div id="container">
		<div id="procuraUsuario">
			<div>
				<input type="text" id="procuraInput">
			</div>
			<div>				
				<input id="btnInput" type="button" onclick="pesquisar()">	
			</div>	
			
		</div>
		
		<?php
			//aqui jaz tudo
			//se der ruim, ta aqui
			include("../Include/connect.inc.php");







			//include '../Include/usuario.inc.php';
		?>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>