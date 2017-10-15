<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Editando Perfil</title>
</head>
<body>
	<?php 
		if ( $_GET['pe'] == $_SESSION['u']) {
			
		
	?>
	<form>
		
	</form>
	<?php 
		} else {
			echo "Esta página não pode ser acessada";
		}
	?>
</body>
</html>