<html>
	<?php
		$title = "Perguntas";
		include '../include/headPS.inc.php';
	?> 
<body>
	<?php
		$titulo= "Perguntas";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
		
	<div id="container">
		<div id="home">
		<?php
			if(isset($_SESSION['u'])){
		?>
			<a href="prg_new.php">
				<div class="stockDivLight">
					<div class="stockTexto"><span class="aa">Perguntar</span></div>
					<div class="stockimage">
						<br><br><br>
							<span class="stockSubItem">•Não fique com a duvida,pergunte-a aqui</span>
					</div>
				</div>
			</a>
		<?php
			}else{
		?>
			<div class="stockDivLight trapPerg">
				<div class="stockTexto"><span class="aa">Perguntar</span></div>
				<div class="stockimage">
					<br><br><br>
						<span class="stockSubItem">•Não fique com a duvida,pergunte-a aqui</span>
				</div>
			</div>
		<?php
			}
		?>

			<a href="perg_pesq.php">
				<div class="stockDivDark">
					<div class="stockimage">
						<br><br><br>
						<span class="stockSubItem">•Ajude as pessoas com o seu conhecimento</span>
					</div>
					<div class="stockTexto"><span class="aa">Pesquisar</span></div>
				</div>
			</a>

		</div>
	</div>
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>