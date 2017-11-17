<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php if (isset($_GET['query'])){ echo $_GET['query']."|Perguntas"; }else{echo "Pergunta Inexistente";} ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>	
	<?php
		if (isset($_GET['query'])){ // inicio do if
			$titulo = $_GET['query'];
			include '../Include/getPergData.inc.php';
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
			
	?>
		<div id="container">

			<span style="background-color: #ededed; line-height: 50px; ";><span style="margin-left: 15px">Categoria:</span><?php echo "$cat"; ?> </span> <br>

			<div id="pergunta">
				<div id="foto">
					<img src=<?php echo "../Perfis/" . $urlFoto ?> class='imgPergunta'>
				</div>

				<div id="textoPerg">
					<?php
						echo "<p style='margin:0;margin-top:5px;font-size: 16px;'> $texto </p>";
					?>
				</div>
				<div class="criadorPergunta">
					<?php echo "<p style='margin:0;'><a href='../Perfis/index.php?query=$criadorPerg' style='color: #222'> $criadorPerg </a></p>"; ?>		
				</div>
			</div>

			<br><hr style="width: 95%;"><br>
			<!--///////////////////////////////////////////////////////////////////////-->
			<div style=" background-color: #ededed">
				<?php
					if(isset($_SESSION['u'])){
						
				?>
				<div id="newComn" style="margin-left: 9.5%">
					<form method="POST">
						Adicionar Resposta:<br>
						<textarea style="height: 100px;max-height: 200px;width: 89%;max-width: 89%;min-width:89%;margin-left: 0 14%;" name="texto" maxlength="800"></textarea><br><br>
						<input type="submit" name="comentar" style="float: right;background-color: #5d7ba0 ; border: 1px solid #303e4d; cursor: pointer; padding: 10px 20px;"><br>
					</form>
				</div>
				<?php 
					}else{
				?>
				<div id="newComn" style="margin-left: 9.5%">
					<form method="POST">
						Adicionar Resposta:<br>
						<textarea style="height: 100px;max-height: 200px;width: 89%;max-width: 89%;min-width:89%;margin-left: 0 14%;" name="texto"></textarea><br><br>
						<input type="button" value="Enviar" style="float: right;margin-right: 14%;background-color: #5d7ba0 ; border: 1px solid #303e4d; cursor: pointer; padding: 10px 20px;" id="commentTrap"><br>
					</form>
				</div>
				<?php
					}

					//caso o usuario tenha criado a pergunta, permite-o apagá-la
					if (isset($_SESSION['u'])){
						if($criadorPerg==$_SESSION['u']){
						?>
							<form method="POST">
							<input type="submit" name="apagar" value="apagar">	
							</form>				

						<?php
						}
					}
					
					if(isset($_POST['apagar'])){
						$sqlApg = "DELETE FROM resposta WHERE tituloPerg = '$titulo';DELETE FROM pergunta WHERE titulo = '$titulo'";
						$status = sqlsrv_query($conexao,$sqlApg);
						if($status){
							header('Location:../Perfis/index.php?query='.$criadorPerg);
						}
					}


					//comentario
					if(isset($_POST['comentar'])){
						$user  = htmlspecialchars($_SESSION['u']);
						$texto = htmlspecialchars($_POST['texto']);

						$sql = "insert into resposta values('$titulo','$user','$texto',GETDATE())";		

						$status = sqlsrv_query($conexao,$sql);
						if($status){
							echo "<span id='cmnAdd'>Reposta Adicionada!</span>'";
						}else{
							echo "<span id='erro'>Não foi possível adicionar a Resposta!</span>'";
						}
					}
				?>

				<!--///////////////////////////////////////////////////////////////////////////////////-->
				<div id="commentContainer" style="margin: 0 7%;">
					<?php			

					if ( $conexao){
						$qtd = 0;
						$consultaResposta = sqlsrv_query($conexao,"SELECT * FROM Resposta WHERE tituloPerg = '$titulo' ORDER BY data") or die(print_r(sqlsrv_errors()));
						while ( $linha = sqlsrv_fetch_array( $consultaResposta, SQLSRV_FETCH_ASSOC)){
							$qtd = $qtd + 1;
						}

					}//vê o n° de comentários

					if ( $qtd > 0){
						$consulta = (sqlsrv_query($conexao,"SELECT username,texto FROM resposta WHERE tituloPerg = '$titulo' ORDER BY data"));
						while ( $dadosResp = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
							echo"						
							<div class='post'>
								<p class='nomeProj'>".$dadosResp['username']."</p>
								<p class='descricao'><i>". '"' . $dadosResp['texto']. '"' ."</i></p>
							</div>
							";
						}
					}

					?>
				</div>
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