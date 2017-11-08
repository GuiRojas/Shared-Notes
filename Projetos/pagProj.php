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

			if( isset($_GET['indexCmn'])){
				$indexCmn = $_GET['indexCmn'];
			}else{
				$indexCmn = 0;
			}

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
			<!--///////////////////////////////////////////////-->
			<div id="comentBlock">
				<br><br>
				<?php
					if(isset($_POST['sbmCmn'])){
						//add comentario
					}


					if($indexCmn == 0) {
						//fazer nova pergunta
						//botão para progredir para a próxima pergunta
					?>

						<form method="POST">
							<textarea>Adicionar Comentário. . .</textarea>
							<br>
							<input type="submit" name="sbmCmn">	
						</form>

					<?php

					}else{
						//exibir a pergunta

						if(isset($textoCmn)){ //apenas exibir se existir
					?>					
						<textarea><?php echo $textoCmn ?></textarea><br>
						<?php echo "$criadorCmn <br> $data <br><br>
									<input type=button value='proxCmn'><br>
									<input type=button value='antCmn'>" ?>


					<?php
						}else{//parar de trocar de pergunta
					?>

					<?php
						}
					}

				

				?>
				
			</div>
		</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>