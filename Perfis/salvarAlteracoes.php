<?php 
	session_start();

	include '../Include/connect.inc.php';
	
	
	$_POST['status'] = htmlspecialchars($_POST['status']);
	$_POST['especialidade'] = htmlspecialchars($_POST['especialidade']);

	if ( $_FILES['file']['size'] != 0){
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$save_file_name = $target_dir . $_SESSION['u'] . "." . $imageFileType;

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["file"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}

		// Check file size
		if ($_FILES["file"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			// Check if file already exists
			if (file_exists($save_file_name)) {
				unlink($save_file_name);
			}
		    if (move_uploaded_file($_FILES["file"]["tmp_name"], $save_file_name)) {
		        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}


		$sql = ("updatePerfilFoto_sp '::status','::espec','::foto','::user'");
	}else{

		if( $_POST['statusFoto'] == "true" ){
			$_POST['statusFoto'] = "false";

			$sql = ("updatePerfilFoto_sp '::status','::espec',img/null.png','::user'");
		}else{
			$sql = ("updatePerfilSemFoto_sp '::status','::espec','::user'");
		}
	}

	$sql = str_replace('::status', $_POST['status']       , $sql);
	$sql = str_replace('::espec' , $_POST['especialidade'], $sql);
	$sql = str_replace('::foto'  , $save_file_name        , $sql);
	$sql = str_replace('::user'  , $_SESSION['u']         , $sql);

	if((!strpos($sql,'DROP'))&&(!strpos($sql,'drop'))&&(!strpos($sql,'DELETE'))&&(!strpos($sql,'delete'))&&(!strpos($sql,'UPDATE'))&&(!strpos($sql,'update'))){
		sqlsrv_query($conexao,$sql);									
	}else{
		?>
			<script type="text/javascript">myAlert("texto Inválido no campo preenchido")</script>
		<?php
	}	
	
	if ( isset($_SESSION['u']))
		echo $_SESSION['u'];
	header("Location: index.php?query=$_SESSION[u]");
?>