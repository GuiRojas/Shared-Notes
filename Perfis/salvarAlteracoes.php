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

	$_POST['status'] = mysql_escape_string($_POST['status']);
	$_POST['especialidade'] = mysql_escape_string($_POST['especialidade']);

	$sql = ("UPDATE usuario SET user_status = '".$_POST['status']."' WHERE username= '".$_SESSION['u']."';
				UPDATE usuario SET especialidade = '".$_POST['especialidade']." 'WHERE username= '".$_SESSION['u']."'");

	sqlsrv_query($conexao,$sql);
	
	if ( isset($_SESSION['u']))
		echo $_SESSION['u'];
	header("Location: index.php?query=$_SESSION[u]");
?>