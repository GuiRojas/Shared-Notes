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
			include '../Include/getPergData.inc.php';
			$titulo= "$username";
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
	?> 

		</form>
	</div>

	<?php

	?>

	<div id="container">
		<?php
			include '../Include/getPergData.inc.php';
		?>
		<!--
			<div id='profilePosts'>

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Projetos postados(<?php echo "$projPostado" ?>)</p> 
						<?php 
							if(isset($_SESSION['u'])){
								if($_SESSION['u'] == $_GET['query'])
						?>
						<div class="link"><a href="../Perguntas/index.php"> Postar um projeto</a></div> 
						<?php
							};
						?>
					</div>
					<div class='postArea'>
						<div class='postsFechados'>
							<p class='nomeProj'>. . .</p>
						</div>
						<div class='projDesc'>
							
						</div>
					</div>
				</div>

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Perguntas feitas(<?php 
					// echo"$perguntasFeitas" ?>)</p></div>
					<div class='postArea'>
						<div class='postsFechados'>
							<p class='nomeProj'>. . .</p>
						</div>
						<div class='projDesc'>
							
						</div>
					</div>
				</div>	

				<div class='info'>
					<div class='postTitle'><p class='txtPostTitle'>Perguntas respondidas(<?php // echo"$perguntasRespondidas" ?>)</p></div>
					<div class='postArea'>	
						<div class='postsFechados'>
							<p class='nomeProj'>. . .</p>
						</div>
					</div>
				</div>
			</div>


			<?php // include '../Include/profile.inc.php';?>
			-->
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>