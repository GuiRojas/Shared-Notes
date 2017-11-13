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
		include '../Include/function.inc.php';

	?>
		
	<div id="container">
		<div id="areaFrm">

			<form method="POST">
				<div class="tituloProjNew"> <p class="tlt">Mudar email:</p></div>
				<input type="text" name="email"
				<?php				
					echo "value=".$_SESSION['email']; 					
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

			//verifica se está preenchido o campo do email
			if(isset($_POST['email'])){
				if(!(validate_email($_POST['email'])))
					echo "Email inválido!";
				else{
					$sql = ("UPDATE usuario SET email = '".$_POST['email']."' WHERE username= '".$_SESSION['u']."'");
					//muda o email no banco de dados
					$status = sqlsrv_query($conexao,$sql);
					if($status){
						$_SESSION['email']=$_POST['email'];
					}
	
				}

			}

			//verifica se estão preenchidos os campos de senha
			if((isset($_POST['senha_ant']))&&(isset($_POST['senha_nova']))&&(isset($_POST['senha_verf']))){

				//e não estão vazias
				if(($_POST['senha_ant']=='')&&($_POST['senha_nova']=='')&&($_POST['	senha_verf']=='')){
						//  nada
				}else{
					//vê se elas são iguais
					if($_POST['senha_nova'] == $_POST['senha_verf']){

						//caso senha nova e antiga sejam iguais
						if($_POST['senha_ant'] == $_POST['senha_nova']){

							//verifica segunrança da senha e altera no bando de dados
							if(testPassword(htmlspecialchars($_POST['senha_nova']))>1){

								$sql=("login_sp '".$_SESSION['u']."'");
								$status=sqlsrv_query($conexao,$sql);

								if($dados=sqlsrv_fetch_array($status)){

									$pass_verf=$dados[3];	

									//caso a senha antiga esteja correta
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
										}//status


									}else{
										?>
											<script type="text/javascript">myAlert("Senha antiga incorreta")</script>
										<?php
									}//else do pass_verify

								}//select

							}else{
								?>
									<script type="text/javascript">myAlert("Senha nova muito fraca")</script>
								<?php
							}//else da força da senha	

						}else{
							?>
								<script type="text/javascript">myAlert("Senha nova igual à antiga")</script>
							<?php
						}//else das senhas iguais

					}else{
						?>
							<script type="text/javascript">myAlert("Senhas diferem")</script>
						<?php
					}//else das senhas diferentes

				}//else dos campos preenchidos
				
			}//else do isset
			
			?>

		</div>			
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>