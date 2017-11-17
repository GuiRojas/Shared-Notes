<html>
<head>
	<?php
	if ( isset($_GET['query'])){ // inicio do if
		$nomeUsuario = $_GET['query'];
		include '../Include/getUserData.inc.php';
		$titulo= "$username";
	?>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "$username|Perfis"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';

			if( isset($_SESSION['u'])){ //verifica se está logado
				if ($_SESSION['u'] == $_GET['query']) {			
			 	//verifica se é o perfil do visitante
	?>
	
	<div id="editPage">
		<form id="editForm" action='salvarAlteracoes.php' method="POST" enctype="multipart/form-data">
			<h1> <?php echo "$username";?> </h1>
			<hr>
			<img <?php echo"src='$urlFoto'" ?> id="preview" class='img'>
			<div id="btnsFoto">
				<input type="button" style="height: 25px; margin: 0; margin-top: 10px; width: 90%" id="carregarFoto" class="btnSalvar" value="Mudar a foto" onclick="document.getElementById('mudarFoto').click();" />
				<input type="button" style="height: 25px; margin: 0; margin-top: 10px; width: 100%" class="btnCancelar" value="Remover foto" onclick="document.getElementById('preview').src = 'img/null.png';" />
			</div>
			<input type="file" style="display:none;" id="mudarFoto" name="file" accept="image/*">

			<span class="campoSpan">Status:</span> <textarea name="status" cols="50" rows="3" class="campo" maxlength="150"><?php echo"$status"?></textarea>
			<span class="campoSpan">Especialidade:</span>
			<select name="especialidade" id="chngEspecialidade" class="campo" >
				<option style="display: none" selected><?php echo"$especialidade" ?></option>
				<option>Nada</option>
				<option>Tudo sobre front end</option>
				<option>Tudo sobre back end</option>
				<option>PHP</option>
				<option>JavaScript</option>
				<option>SQL Server</option>
				<option>MySQL</option>
				<option>Java</option>
				<option>Pascal</option>
				<option>C</option>
				<option>C#</option>
				<option>C++</option>
			</select>
			
			<div id="btns">
				<input type="submit" class="btnSalvar" value="Salvar alterações">
				<input type="button" class="btnCancelar" value="Cancelar">
			</div>

		</form>
	</div>

	<?php
				}
			}
		}else{
			header('Location:../Login/login.php');
		} // fim do if
	?>

	<div id="container">
		<?php
			include '../Include/getUserData.inc.php';
		?>
			<div id='profilePosts'>

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Projetos postados(<?php echo "$projPostado" ?>)
						<?php
								if((isset($_SESSION['u']))&&($_SESSION['u'] == $_GET['query'])){
						?>
						<div class="link"><a href="../Projetos/projNew.php"> Postar um projeto</a></div> 
						<?php
							};
						?>
					</p> </div>
					<div class='postArea'>
						<div class='postsFechados' id="postsFechados1">
							<p class='nomeProj' id="nomeProj1">▶</p>
						</div>
						<div class='projDesc' id="projDesc1">
							<?php
								if (  $projPostado > 0){
									$consulta = (sqlsrv_query($conexao,"SELECT * FROM projeto WHERE criador = '". $_GET['query'] ."'"));
									while ( $dadosPerg = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
										echo"
										<a href='../Projetos/pagProj.php?query=".$dadosPerg['titulo']."'  style='text-decoration:none'> 
											<div class='post'>
												<p class='nomeProj'>".$dadosPerg['titulo']."</p>
												<p class='txtDescricao'>Descição:</p>
												<p class='descricao'><i>". '"' . $dadosPerg['descricao']. '"' ."</i></p>
											</div>
										</a>
										";
									}
								}
							?>
						</div>
					</div>
				</div>

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Perguntas feitas(<?php echo"$perguntasFeitas" ?>)
						<?php 
								if((isset($_SESSION['u']))&&($_SESSION['u'] == $_GET['query'])){
						?>
						<div class="link"><a href="../Perguntas/prg_new.php"> Fazer uma pregunta</a></div> 
						<?php
							};
						?>
					</p></div>
					<div class='postArea'>
						<div class='postsFechados' id="postsFechados2">
							<p class='nomeProj' id="nomeProj2">▶</p>
						</div>
						<div class='projDesc' id="projDesc2">
							<?php
								if (  $perguntasFeitas > 0){
									$consulta = (sqlsrv_query($conexao,"SELECT * FROM pergunta WHERE criador = '". $_GET['query'] ."'"));
									while ( $dados = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
										echo"
										<a href='../Perguntas/perg.php?query=".$dados['titulo']."'  style='text-decoration:none'> 
											<div class='post'>
												<p class='nomeProj'>".$dados['titulo']."</p>
												<p class='txtDescricao'>Categoria:</p>
												<p class='descricao'><i>". '"' . $dados['categoria']. '"' ."</i></p>
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

			<?php include '../Include/profile.inc.php';?>

	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>