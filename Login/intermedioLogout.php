<!DOCTYPE html>
<html>
	<?php
		$title = "LogOut";
		include '../include/headCD.inc.php';
	?> 
<body style="background-color: #5d7ba0">
	<div>
		
	</div>
	<?php
		session_start();
		include '../include/tituloCadastro.inc.php';
		session_destroy();
	?>
	<h1>Você foi deslogado.</h1>
	<div style="color: #303E4D; font-size: 23px; text-align: center; margin: 0"><a href="../home/index.php" style="color: #303E4D; font-size: 23px; text-align: center; margin: 0"> Ir para a home.</a></div

</body>
</html>