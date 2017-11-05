<?php 
	session_start();

	function testPassword($password){
	    if ( strlen( $password ) == 0 )
	    
	        return 1;
	    
	 
	    $strength = 0;
	 
	    /*** get the length of the password ***/
	    $length = strlen($password);
	 
	    /*** check if password is not all lower case ***/
	    if(strtolower($password) != $password)
	    {
	        $strength += 1;
	    }
	 
	    /*** check if password is not all upper case ***/
	    if(strtoupper($password) == $password)
	    {
	        $strength += 1;
	    }
	 
	    /*** check string length is 8 -15 chars ***/
	    if($length >= 8 && $length <= 15)
	    {
	        $strength += 1;
	    }
	 
	    /*** check if lenth is 16 - 35 chars ***/
	    if($length >= 16 && $length <=35)
	    {
	        $strength += 2;
	    }
	 
	    /*** check if length greater than 35 chars ***/
	    if($length > 35)
	    {
	        $strength += 3;
	    }
	 
	    /*** get the numbers in the password ***/
	    preg_match_all('/[0-9]/', $password, $numbers);
	    $strength += count($numbers[0]);
	 
	    /*** check for special chars ***/
	    preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^\\\]/ ', $password, $specialchars);
	    $strength += sizeof($specialchars[0]);
	 
	    /*** get the number of unique chars ***/
	    $chars = str_split($password);
	    $num_unique_chars = sizeof( array_unique($chars) );
	    $strength += $num_unique_chars * 2;
	 
	    /*** strength is a number 1-10; ***/
	    $strength = $strength > 99 ? 99 : $strength;
	    $strength = floor($strength / 10 + 1);
	 
	    return $strength;
	}
	
	function validate_email($email){
	    if(!preg_match ("/^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$/", $email))
	        return false;
	    list($prefix, $domain) = explode("@",$email);
	    if(function_exists("getmxrr") && getmxrr($domain, $mxhosts))
	        return true;
	    elseif (@fsockopen($domain, 25, $errno, $errstr, 5))
	        return true;
	    else
	        return false;
	}

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


		$sql = ("UPDATE usuario SET 
			user_status = '".$_POST['status']."',
			especialidade = '".$_POST['especialidade']."',
			foto = '" . $save_file_name. "'   
			WHERE username= '".$_SESSION['u']."'");
	}else{
		$sql = ("UPDATE usuario SET 
			user_status = '".$_POST['status']."',
			especialidade = '".$_POST['especialidade']."'
			WHERE username= '".$_SESSION['u']."'");
	}

	sqlsrv_query($conexao,$sql);
	
	if ( isset($_SESSION['u']))
		echo $_SESSION['u'];
	header("Location: index.php?query=$_SESSION[u]");
?>