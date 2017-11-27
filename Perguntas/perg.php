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
			<?php 
				if( isset($_SESSION['pergFeita']) && $_SESSION['pergFeita']){
					?>
						<script type="text/javascript"> myAlert("Pergunta feita com sucesso!");</script>
					<?php
					$_SESSION['pergFeita'] = false;
				}

			?>
			<span style="background-color: #ededed; line-height: 50px; ";><span style="margin-left: 15px">Categoria:</span><?php echo "$cat"; ?> </span> <br>
			
			<?php
			//caso o usuario tenha criado a pergunta, permite-o apagá-la
			if (isset($_SESSION['u'])){
				if($criadorPerg==$_SESSION['u']){
				?>
					<form method="POST" style="position: absolute;margin-top: 75px;margin-left: 88px;">
					<input type="submit" name="apagar" value="apagar" style="display: inline-block;">	
					</form>				
				<?php
				}
			}?>

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
						<input type="submit" name="comentar" style="margin-right: 11%;float: right;background-color: #5d7ba0 ; border: 1px solid #303e4d; cursor: pointer; padding: 10px 20px;"><br>
					</form>
				</div>
				<?php 
					}else{
				?>
				<div id="newComn" style="margin-left: 9.5%">
					<form method="POST">
						Adicionar Resposta:<br>
						<textarea style="height: 100px;max-height: 200px;width: 89%;max-width: 89%;min-width:89%;margin-left: 0 14%;" name="texto"></textarea><br><br>
						<input type="button" value="Enviar" style="display: inline-block;float: right;background-color: #5d7ba0 ; border: 1px solid #303e4d; cursor: pointer; padding: 10px 20px;" id="commentTrap"><br>
					</form>
				</div>
				<?php
					}
					
					if(isset($_POST['apagar'])){
						$sqlApg = "deletePerg_sp $titulo";
						$status = sqlsrv_query($conexao,$sqlApg);
						if($status){
							header('Location:../Perfis/index.php?query='.$criadorPerg);
						}
					}


					//comentario
					if(isset($_POST['comentar'])){
						$user  = htmlspecialchars($_SESSION['u']);
						$texto = htmlspecialchars($_POST['texto']);

						$sql = "comentar_sp '$titulo','$user','$texto'";		

						$status = sqlsrv_query($conexao,$sql);
						if($status){
							?>
								<script type="text/javascript"> myAlert("Resposta feita!");</script>
							<?php
						}else{
							?>
								<script type="text/javascript"> myAlert("Não foi possível adicionar a resposta.");</script>
							<?php
						}
					}
				?>

				<!--///////////////////////////////////////////////////////////////////////////////////-->
				<div id="commentContainer" style="margin: 0 7%;">
					<?php	

					$consulta = (sqlsrv_query($conexao,"getComentario_sp '$titulo'"));
					while ( $dadosResp = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
						$qtd = $qtd+1;
					}							

					if ( $qtd > 0){
						$consulta = (sqlsrv_query($conexao,"getComentario_sp '$titulo'"));
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