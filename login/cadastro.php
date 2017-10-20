<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>SN - Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		include '../include/tituloCadastro.inc.php'; 
	?>
	
	<h1>Cadastro</h1>
	<div id="cadastro">
		<form action="cadastro.php" method="POST">
			<span class="campos">Nome de Usuario:</span><br>
			<input class="camposInput" type="text" name="username" maxlength="25" ><br>
			<span class="campos">Senha:</span><br>
			<input class="camposInput" type="password" name="senha" ><br>
			<span class="campos">Confirmar senha:</span><br>
			<input class="camposInput" type="password" name="senha_conf" ><br>
			<span class="campos">Email:</span><br>
			<input class="camposInput" type="text" name="email" maxlength="100"><br>
			<span class="campos">Nome:</span><br>
			<input class="camposInput" type="text" name="nome" maxlength="50" ><br>

			<span class="campos"><a href="login.php">Já tem uma conta? Entre aqui.</a></span><br>	

			<?php 
		if(isset($_POST['username'])&&isset($_POST['senha'])&&isset($_POST['senha_conf'])&&isset($_POST['email'])&&isset($_POST['nome'])){
			
			include("../Include/connect.inc.php");

			if(htmlspecialchars($_POST['senha'])===htmlspecialchars($_POST['senha_conf'])){ 

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

				 
				if(testPassword(htmlspecialchars($_POST['senha']))>1){
					if (!validate_email(htmlspecialchars($_POST['email']))){
    					echo '<span class="campos" id="msgErro">Email Inválido!</span>';
					}else{
						$username=htmlspecialchars($_POST['username']);							
						$senha=htmlspecialchars($_POST['senha']);
						$email=htmlspecialchars($_POST['email']);
						$nome=htmlspecialchars($_POST['nome']);

						if((strpos(';',$username)!==false)||(strpos(';',$senha)!==false)||(strpos(';',$nome)!==false)){
							$stored_pass=password_hash($senha,PASSWORD_BCRYPT,array(
											'cost'=>10
										 ));

							$sql = ("cadastro_sp '$username','$email','$nome','$stored_pass'");

							$status = sqlsrv_query( $conexao, $sql);
							
							if($status){
								session_start();
								$_SESSION['u']=$username;
								header('Location:../Home/index.php');
							}else{
								$status=sqlsrv_query($conexao,$sql);
								echo '<span class="campos" id="msgErro">Não foi possivel realizar a inclusão</span>';
							}
						}else{
							echo '<span class="campos" id="msgErro">Caracteres inválidos!</span>';
						}
					}					
				}else{
					echo '<span class="campos" id="msgErro">Senha não é forte o suficiente!<span><br>';
				}		

			}else{
				echo '<span class="campos" id="msgErro">Senha difere da confirmação</span><br>'; 
			}

		}

		?> <br>

			<input type="submit" name="Cadastrar" id="enviar">
		</form>
	</div>
	

	<?php


		include '../Include/bot.inc.php';
	?>

</body>
</html>