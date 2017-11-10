<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Procurar Perfis</title>
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

				$query = htmlspecialchars($_GET['query']);
				$_SESSION['query'] = $query;
				if( $query != null or $query != ""){
			        $status = sqlsrv_query( $conexao, "SELECT username FROM usuario WHERE username like '$query'", array(), array("Scrollable"=>"buffered"));

			        $rowCount= sqlsrv_num_rows($status);

					if ( $rowCount >=1) { 
			        	$nomeUsuario = "$query";
						include '../Include/getUserData.inc.php';
			        	echo "
			        	<a class='usuDataA' href='index.php?query=$query'>
				        	<div class='usuData'>
								<div class='nomeEFoto'>
										<img class='imgProfilePreview' src='$urlFoto'>
										<span style='display:inline-block; margin: 0;'>$username</span>
								</div>
								<div class='linhaVertical'></div>
								<div class='info'>
									<div style='height:45px'>especialidade : $especialidade</div>
									<div style='height:45px'>Projetos postados : $projPostado</div>
								</div>
							</div>
			        	</a>";
			        } else {
				        ?> <script>myAlert("Usuario \"<?php  echo"$query"  ?>\" não encontrado.")</script> <?php
				    }
		        }
			}
		?>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>