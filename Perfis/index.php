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
			$nomeUsuario = $_GET['query'];
			include '../Include/getUserData.inc.php';
			$titulo= "$username";
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';

			if( isset($_SESSION['u'])){ //verifica se está logado
				if ($_SESSION['u'] == $_GET['query']) {			
			 	//verifica se é o perfil do visitante
	?>
	
	<div id="editPage">
		<form id="editForm" action='<?php echo "salvarAlteracoes.php" ?>' method="POST">
			<h1> <?php echo "$username";?> </h1>
			<hr>
			<img src='$urlFoto' class='img'>
			<span class="campoSpan">Status:</span> <textarea name="status" cols="50" rows="3" class="campo" maxlength="150"> <?php echo"$status"?> </textarea>
			<span class="campoSpan">Especialidade:</span> 
			<select name="especialidade" id="chngEspecialidade" class="campo">
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
				<option>Nada</option>
			</select>
			
			<div id="btns">
				<input type="submit" class="btnSalvar" value="Salvar alterações">
				<input type="button" class="btnCancelar" value="Cancelar">
			</div>

		</form>
	</div>

	<?php
		
				}else{//se não, permite a opção de seguir
				?>
				<div id="seguir">
					<span id="seguindo">
						<?php
						//sql bla bla bla
						?>
					</span>
				</div>


				<?php
				}
			}
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
							if(isset($_SESSION['u'])){
								if($_SESSION['u'] == $_GET['query'])
						?>
						<div class="link"><a href="../Projetos/index.php"> Postar um projeto</a></div> 
						<?php
							};
						?>
					</p> </div>
					<div class='postArea'>
						<div class='postsFechados'>
							<p class='nomeProj'>▼</p>
						</div>
						<div class='projDesc'>
							
						</div>
					</div>
				</div>

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Perguntas feitas(<?php echo"$perguntasFeitas" ?>)
						<?php 
							if(isset($_SESSION['u'])){
								if($_SESSION['u'] == $_GET['query'])
						?>
						<div class="link"><a href="../Perguntas/prg_new.php"> Fazer uma pregunta</a></div> 
						<?php
							};
						?>
					</p></div>
					<div class='postArea'>
						<div class='postsFechados'>
							<p class='nomeProj'>▼</p>
						</div>
						<div class='projDesc'>
							
						</div>
					</div>
				</div>	

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Perguntas respondidas(<?php echo"$perguntasRespondidas" ?>)
						<?php 
							if(isset($_SESSION['u'])){
								if($_SESSION['u'] == $_GET['query'])
						?>
						<div class="link"><a href="../Perguntas/index.php"> Responder uma pergunta</a></div> 
						<?php
							};
						?>
					</p></div>
					<div class='postArea'>	
						<div class='postsFechados'>
							<p class='nomeProj'>▼</p>
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