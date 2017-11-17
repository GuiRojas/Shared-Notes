<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Pesquisar Perguntas</title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
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
		<form method="GET">
			<div id="procuraUsuario">
			<div>
				<input type="text" id="query" name="query">
			</div>
			<div>
				<input type="submit" id="btnInput" value="">	
			</div>				
		</form>
		
			
		<?php
			include("../Include/connect.inc.php");

			if(isset($_GET['query'])){

				$query = htmlspecialchars($_GET['query']);
				$_SESSION['query'] = $query;
				if( $query != null or $query != ""){

					$qtd = 0;
			        $consultaPergunta = sqlsrv_query($conexao, "SELECT * FROM pergunta WHERE titulo like '%$query%'") or die(print_r(sqlsrv_errors()));
			        while ( $linha = sqlsrv_fetch_array( $consultaPergunta, SQLSRV_FETCH_ASSOC)){
						$qtd = $qtd + 1;
					}	

				    if ( $qtd > 0) { 
						$consulta = (sqlsrv_query($conexao,"SELECT * FROM pergunta WHERE titulo like '%$query%'"));
						while ( $dadosPerg = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
							echo "
			        	<a class='usuDataA' href='perg.php?query=".$dadosPerg['titulo']."'>
				        	<div class='usuData'>
							
								<div class='linhaVertical'>".$dadosPerg['titulo']."</div>
								
							</div>
			        	</a><br>";
						}
						echo "<br><br>";
					}

				}
			}
		?>
	</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>
