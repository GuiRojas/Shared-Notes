<?php
	session_start();

	include '../Include/connect.inc.php';

	if ( isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_FILES['file_upload']))
	{
		$_POST['titulo'] = htmlspecialchars($_POST['titulo']);
		$_POST['descricao'] = htmlspecialchars($_POST['descricao']);
		$_POST['nota'] = htmlspecialchars($_POST['descricao']);

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$save_file_name = $target_dir . $_POST['titulo'] . "." . $imageFileType;

		// Check file size
		//if ($_FILES["file"]["size"] > 500000) {
		//    echo "Sorry, your file is too large.";
		//   $uploadOk = 0;
		//}
		// Allow certain file formats
		if($imageFileType != "zip" && $imageFileType != "rar" && $imageFileType != "txt"
		&& $imageFileType != "html" && $imageFileType != "js" && $imageFileType != "php" ) {
		?>    
		<script> alert("Os arquivos podem ser apenas txt, zip, rar, js, html e php.")</script>
		<?php 
			$uploadOk = 0;
			}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Infelizmente, o upload do seu arquivo não pode ser feito.";
		// if everything is ok, try to upload file
		} else {
			// Check if file already exists
			if (file_exists($save_file_name)) {
				unlink($save_file_name);
			}
		    if (move_uploaded_file($_FILES["file"]["tmp_name"], $save_file_name)) {
		        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		    } else {
		        echo "Infelizmente, ocorreu um erro durante o upload do seu arquivo.";
		    }
		}

		$nomeUsuario = $_SESSION['u'];
		include '../Include/getUserData.inc.php';

		$projPostado = $projPostado+1;

			$sql = ("INSERT INTO projeto VALUES ('".$_POST['titulo']."', '".$_POST['descricao']."', '" . $_POST['nota']. "', '".$_SESSION['u']."' , '" . $save_file_name. "');
					UPDATE usuario SET projetos_postados = ". $projPostado . " WHERE username = '". $_SESSION['u'] ."' ");

		sqlsrv_query($conexao,$sql);

		header("Location: index.php?query=$_SESSION[u]");
	}else{
		echo "Preencha todos os campos.";
	}
?>