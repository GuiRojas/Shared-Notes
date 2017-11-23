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

			if(isset($_GET['query'])){//bloco de pesquisa

				$query = htmlspecialchars($_GET['query']);
				if( $query != null or $query != ""){
			        
					$qtd = 0;
					$consultaUsuario = sqlsrv_query($conexao,"selectUser_sp '$query'") or die(print_r(sqlsrv_errors()));
					while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
						$qtd = $qtd + 1;
					}				


					if ( $qtd > 0) { 
						$consulta = (sqlsrv_query($conexao,"selectUser_sp '$query'"));
						while ( $dadosUsu = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
							echo "
				        	<a class='usuDataA' href='index.php?query=".$dadosUsu['username']."'>
					        	<div class='usuData'>
									<div class='nomeEFoto'>
											<img class='imgProfilePreview' src='".$dadosUsu['foto']."'>
											<span style='display:inline-block; margin: 0;'>".$dadosUsu['username']."</span>
									</div>
									<div class='linhaVertical'></div>
									<div class='info'>
										<div style='height:45px'>especialidade : ".$dadosUsu['especialidade']."</div>
									</div>
								</div>
				        	</a>";
						}
						echo "<br><br>";
			        	
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