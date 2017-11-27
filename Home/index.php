<html>
<head>
	<?php
		$title = "Shared Notes";
		include '../include/headPS.inc.php';
	?> 
</head>
<body>
	<?php
		$titulo = "Home";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>

	<div id="container">
		<div id="home">
		<?php 
			if (isset($_SESSION['firstTime']) && $_SESSION['firstTime']) {
				?>
					<script type="text/javascript"> myAlert("Bem-vindo(a) ao Shared Notes!");</script>
				<?php
				$_SESSION['firstTime'] = false;
			}
		?>

			<a href="../Perfis/perfilMenu.php" style="text-decoration:none">
				<div class="stockDivLight">
					<div class="stockTexto"><span class="aa">Procure por outras pessoas</span></div>
					<div class="stockimage">
						<br>
						<span class="stockSubItem">•Você pode achar outras pessoas</span><br><br>
						<span class="stockSubItem">•Nos perfis, pode baixar seus projetos</span>
					</div>
				</div>
			</a>
			
			<a href="../Perguntas/index.php" style="text-decoration:none">
				<div class="stockDivDark">
					<div class="stockimage">
						<br><br><br>
						<span class="stockSubItem">•Faça uma pergunta sobre determinado assunto</span><br><br>
					</div>
					<div class="stockTexto"><span class="aa">Pergunte ou responda</span></div>
				</div>
			</a>
			
			<a href="../projetos/index.php" style="text-decoration:none">
				<div class="stockDivLight"><!--vai pro perfil da pessoa, se n tiver logada, abre o login-->
					<div class="stockTexto"><span class="aa">Compartilhe seus projetos</span></div>
					<div class="stockimage">
						<br><br><br>
						<span class="stockSubItem">•Poste seus projetos e as pessoas poderão baixá-los em seu perfil</span><br><br>
					</div>
				</div>
			</a>

		</div>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>