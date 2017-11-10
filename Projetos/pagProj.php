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

			<?php
			if(isset($_SESSION['u'])){
			?>
			<!--novo coment-->
			<div id="newComn" style="margin-left: 9.5%">
				<form method="POST">
					Adicionar comentário:<br>
					<textarea style="height: 100px;max-height: 200px;width: 97%;max-width: 97%;min-width:97%" name="texto">Digite um comentário . . .</textarea><br><br>
					<input type="submit" name="comentar" style="float: right;margin-right: 32px"><br>
				</form>
			</div>

			<?php
			}else{
				echo "Logue para Comentar!";
			}
				if(isset($_POST['comentar'])){
					$user  = htmlspecialchars($_SESSION['u' ]);
					$texto = htmlspecialchars($_POST['texto']);

					$sql = "insert into projComentario values('$tituloProj','$user','$texto',GETDATE())";		

					$status = sqlsrv_query($conexao,$sql);
					if($status){
						echo "<span id='cmnAdd'>Comentário Adicionado!</span>'";
					}else{
						echo "<span id='erro'>Não foi possível adicionar o comentário</span>'";
					}
				}
			?>

			<!--///////////////////////////////////////////////////////////////////////////////////-->
			<div id="commentContainer" style="margin-left: 7%">
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
						echo"						
						<div class='post'>
							<p class='nomeProj'>".$dadosCom['criador']."</p>
							<p class='txtDescricao'>Descição:</p>
							<p class='descricao'><i>". '"' . $dadosCom['texto']. '"' ."</i></p>
						</div>
						";
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