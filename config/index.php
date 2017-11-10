<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Configurações</title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		$titulo= "Configurações";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';

	?>
		
	<div id="container">
		<div id="areaFrm">

			<form method="POST">
				<div class="tituloProjNew"> <p class="tlt">Mudar email:</p></div>
				<input type="text" name="email"
				<?php
					if(isset($_POST['email']))
						echo "value=".$_POST['email']; 
					else{
						echo "value=".$_SESSION['email']; 
					}
				?> class="respProjNew" maxlength="100">

				<div class="tituloProjNew"> <p class="tlt">Senha antiga:</p></div>
				<input type="password" name="senha_ant" class="respProjNew">

				<div class="tituloProjNew"> <p class="tlt">Confirmar senha:</p></div>
				<input type="password" name="senha_verf" class="respProjNew">

				<div class="tituloProjNew"> <p class="tlt">Senha nova:</p></div>
				<input type="password" name="senha_nova" class="respProjNew">

				<hr>
				<input type="submit" name="vai" value="mudar" class="btnEnviar">
			</form>

			<?php
			include '../Include/connect.inc.php';

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

			if(isset($_POST['email'])){
				if(!(validate_email($_POST['email'])))
					echo "Email inválido!";
				else{
					$sql = ("UPDATE usuario SET email = '".$_POST['email']."' WHERE username= '".$_SESSION['u']."'");

					$status = sqlsrv_query($conexao,$sql);
					if($status){
						$_SESSION['email']=$_POST['email'];
					}
	
				}

			}

			if((isset($_POST['senha_ant']))&&(isset($_POST['senha_nova']))&&(isset($_POST['senha_verf']))){

				if(($_POST['senha_ant']=='')&&($_POST['senha_nova']=='')&&($_POST['senha_verf']=='')){
					//  :)
				}else{
					if($_POST['senha_nova'] == $_POST['senha_verf']){

						if($_POST['senha_ant'] == $_POST['senha_nova']){

							if(testPassword(htmlspecialchars($_POST['senha_nova']))>1){

								$sql=("login_sp '".$_SESSION['u']."'");
								$status=sqlsrv_query($conexao,$sql);

								if($dados=sqlsrv_fetch_array($status)){

									$pass_verf=$dados[3];	

									if(password_verify($_POST['senha_ant'],$pass_verf)){

										$stored_pass=password_hash(htmlspecialchars($_POST['senha_nova']),PASSWORD_BCRYPT,array(
														'cost'=>10
													 ));

										$sql = "UPDATE usuario SET senha = '$stored_pass'
										        WHERE  username = '".$_SESSION['u']."'";
										$status=sqlsrv_query($conexao,$sql);
				
										if($status){
											?>
												<script type="text/javascript">myAlert("Senha atualizada com sucesso!")</script>
											<?php
										}else{
											?>
												<script type="text/javascript">myAlert("Ocorreu um erro")</script>
											<?php
										}


									}else{
										?>
											<script type="text/javascript">myAlert("Senha antiga invalida")</script>
										<?php
									}

								}

							}else{
								?>
									<script type="text/javascript">myAlert("Senha nova muito fraca")</script>
								<?php
							}	

						}else{
							?>
								<script type="text/javascript">myAlert("Senha nova inválida")</script>
							<?php
						}

					}else{
						?>
							<script type="text/javascript">myAlert("Senhas diferem")</script>
						<?php
					}
				}
			}
			
			?>

		</div>			
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>