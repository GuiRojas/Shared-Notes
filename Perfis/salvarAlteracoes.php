<?php 

	function testPassword($password)
				{
				    if ( strlen( $password ) == 0 )
				    {
				        return 1;
				    }
				 
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
	if($conexao){
		sqlsrv_execute(sqlsrv_query($conexao,"UPDATE usuario SET user_status = '$status'"));
		sqlsrv_execute(sqlsrv_query($conexao,"UPDATE usuario SET especialidade = '$especialidade'"));

		if (!( $nova_senha == "" or $nova_senha == null)){
			if ( $senha_antiga === $nova_senha){

				if(testPassword(mysql_escape_string($senha))>1){
					if (!validate_email(mysql_escape_string($email))){
    					echo '<span class="campos" id="msgErro">Email Inválido!</span>';
					}else{
						$senha=mysql_escape_string($senha);
						$email=mysql_escape_string($email);

						$stored_pass=password_hash($senha,PASSWORD_BCRYPT,array(
										'cost'=>10
									 ));
					}			
				}else{
					echo '<span class="campos" id="msgErro">Senha não é forte o suficiente!<span><br>';
				}		
			}else{
				echo '<span class="campos" id="msgErro">Senha difere da confirmação</span><br>'; 
			}
			sqlsrv_execute(sqlsrv_query($conexao,"UPDATE usuario SET senha = 'stored_pass'"));
			sqlsrv_execute(sqlsrv_query($conexao,"UPDATE usuario SET email = '$email'"));
		}
	}
	if ( isset($_SESSION['u']))
		echo $_SESSION['u'];
	//header("Location: index.php?query=$_SESSION[u]");
?>