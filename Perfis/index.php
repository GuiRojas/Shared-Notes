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

			if( isset($_SESSION['u']) && ($_SESSION['u']) == isset($_GET['query'])){ //verifica se é o perfil do visitante
	?> 

	<div id="editPage">
		<form id="editForm" action='<?php echo "salvarAlteracoes.php" ?>' method="POST">
			<h1> <?php echo "$username";?> </h1>
			<hr>
			<img src='$urlFoto' class='img'>
			<span class="campoSpan">Status:</span> <textarea name="status" cols="50" rows="3" class="campo" maxlength="150"><?php echo"$status"?></textarea>
			<span class="campoSpan">Especialidade:</span> <input name="especialidade" id="chngEspecialidade" maxlength="50" type="text" class="campo" <?php echo" value='$especialidade' "?> >
			
			<div id="btns">
				<input type="submit" class="btnSalvar" value="Salvar alterações">
				<input type="button" class="btnCancelar" value="Cancelar">
			</div>

		</form>
	</div>

	<?php
		/*
		if( isset($_POST['status']))
			$status = $_POST['status'];

		if( isset($_POST['Especialidade']))
			$especialidade = $_POST['especialidade'];

		if( isset($_POST['senha_nova']))
			$nova_senha= $_POST['senha_nova'];

		if( isset($_POST['senha_antiga']))
			$senha_antiga= $_POST['senha_antiga'];

		if( isset($_POST['email']))
			$email= $_POST['email'];
		*/
			}
		} // fim do if
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