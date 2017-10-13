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
		<form method="GET">
			<div id="procuraUsuario">
					<div>
						<input type="text" id="query" name="query">
					</div>
					<div>
						<input type="submit" id="btnInput" value="">	
					</div>					
			</div>
		</form>
		
		<?php
			include("../Include/connect.inc.php");

			if(isset($_GET['query'])){

				$query = $_GET['query'];

		        $status = sqlsrv_query( $conexao, "SELECT username FROM usuario WHERE username = '$query'") or die();
				
				if ( $status) {
		        	$nomeUsuario = "$query";
					include '../Include/getUserData.inc.php';
		        	echo "<a href='index.php?u=$query'> $username </a>";
		        }
			}
		?>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>