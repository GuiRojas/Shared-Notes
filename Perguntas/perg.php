<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "Perfis"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>	
	<?php
		if (isset($_GET['query'])){ // inicio do if
			$titulo = $_GET['query'];
			include '../Include/getPergData.inc.php';
			include '../Include/getRespData.inc.php';
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
			
	?>
		<div id="container">
			<h3><i><?php echo "$cat"; ?></i></h3> <br>

			<div id="pergunta">
				<img src=<?php echo "../Perfis/" . $urlFoto ?> class='img'>
				<?php
					echo "<form align = 'center'> $manchete </form><br>";
				?>

				<div id="textoPerg">
					<?php
						echo "$texto";
					?>
				</div>
			</div>
			<div id="resposta">
				<?php
					if (  $projPostado > 0){
						$consulta = (sqlsrv_query($conexao,"SELECT * FROM projeto WHERE criador = '". $_GET['query'] ."'"));
						while ( $dados = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
							echo"
							<a href='../Projetos/pagProj.php?query=".$dados['titulo']."'  style='text-decoration:none'> 
								<div class='post'>
									<p class='nomeProj'>".$dados['titulo']."</p>
									<p class='txtDescricao'>Descição:</p>
									<p class='descricao'><i>". '"' . $dados['descricao']. '"' ."</i></p>
								</div>
							</a>
							";
						}
					}
				?>


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