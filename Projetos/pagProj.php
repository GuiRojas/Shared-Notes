<html>
<head>
	<?php 
		if ( isset($_GET['query'])){ // inicio do if
			$tituloProj = $_GET['query'];
			include '../Include/getProjData.inc.php';
	?>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "$tituloProj|Projetos"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
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
			<!--///////////////////////////////////////////////////////////////////////////////////-->


			<div style=" background-color: #ededed">
				<?php
					if(isset($_SESSION['u'])){
				?>
				<div id="newComn" style="margin-left: 9.5%">
					<form method="POST">
						Adicionar comentário:<br>
						<textarea style="height: 100px;max-height: 200px;width: 89%;max-width: 89%;min-width:89%;margin-left: 0 14%;" name="texto" maxlength="800"></textarea><br><br>
						<input type="submit" name="comentar" style="float: right;background-color: #5d7ba0 ; border: 1px solid #303e4d; cursor: pointer; padding: 10px 20px; margin-right: 14%"><br>
					</form>
				</div>
				<?php 
					}else{
				?>
				<div id="newComn" style="margin-left: 9.5%">
					<form method="POST">
						Adicionar comentário:<br>
						<textarea style="height: 100px;max-height: 200px;width: 89%;max-width: 89%;min-width:89%;margin-left: 0 14%;" name="texto"></textarea><br><br>
						<input type="button" value="Enviar" style="float: right;margin-right: 14%;background-color: #5d7ba0 ; border: 1px solid #303e4d; cursor: pointer; padding: 10px 20px; margin-right: 14%" id="commentTrap"><br>
					</form>
				</div>
				<?php
					}
					if(isset($_POST['comentar'])){
						$user  = htmlspecialchars($_SESSION['u']);
						$texto = htmlspecialchars($_POST['texto']);

						$sql = "insert into projComentario values('$tituloProj','$user','$texto',GETDATE())";		

						$status = sqlsrv_query($conexao,$sql);
						if($status){
							?>
								<script type="text/javascript"> myAlert("Comentário adicionado com sucesso!");</script>
							<?php
						}else{
							?>
								<script type="text/javascript"> myAlert("Não foi possível adicionar o comentário");</script>
							<?php
						}
					}
				?>

				<!--///////////////////////////////////////////////////////////////////////////////////-->
				<div id="commentContainer" style="margin: 0 7%;">
					<?php			

					if ( $conexao){
						$qtd = 0;
						$consultaResposta = sqlsrv_query($conexao,"SELECT * FROM projComentario WHERE projeto = '$tituloProj' ORDER BY data") or die(print_r(sqlsrv_errors()));
						while ( $linha = sqlsrv_fetch_array( $consultaResposta, SQLSRV_FETCH_ASSOC)){
							$qtd = $qtd + 1;
						}

					}//vê o n° de comentários

					if (  $qtd > 0){
						$consulta = (sqlsrv_query($conexao,"SELECT criador,texto FROM projComentario WHERE projeto = '$tituloProj' ORDER BY data"));
						while ( $dadosCom = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
							$nome = $dadosCom['criador'];
							echo"
							<a href='../Perfis/index.php?query=$nome'>			
								<div class='post'>
									<p class='nomeProj'>".$nome."</p>
									<p class='txtDescricao'>Comentário:</p>
									<p class='descricao'><i>". '"' . $dadosCom['texto']. '"' ."</i></p>
								</div>
							</a>
							";
						}
					}

					?>
				</div>
			</div>
		</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>