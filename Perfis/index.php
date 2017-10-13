<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>


	
	<?php
		if ( isset($_GET['u'])){
			$nomeUsuario = $_GET['u'];
			include '../Include/getUserData.inc.php';
			$titulo= "$username";
			include '../Include/top.inc.php';
			include '../Include/side.inc.php';
		} else {
			
		}
	?>

	<div id="container">
		<?php
			include '../Include/profilePosts.inc.php';
			include '../Include/profile.inc.php';
		?>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>