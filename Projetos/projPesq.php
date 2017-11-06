<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Procurar Projetos</title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php	
		$titulo= "Pesquisar projetos";
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
			        $status = sqlsrv_query( $conexao, "SELECT titulo FROM projeto WHERE titulo = '$query'", array(), array("Scrollable"=>"buffered"));

			        $rowCount= sqlsrv_num_rows($status);

					if ( $rowCount >=1) { 
			        	$nomeUsuario = "$query";
						include '../Include/getUserData.inc.php';
			        	echo "<a class='usuDataA' href='pagProj.php?query=$query'>

				        	<div class='usuData'>
								<div class='nomeEFoto'>$query</div>
								<div class='linhaVertical'></div>
								<div class='info'></div>
							</div>
			        	</a>";
			        } else {
				        ?> <script>myAlert("Projeto \"<?php  echo"$query"  ?>\" não encontrado.")</script> <?php
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