<html>
	<?php
		$title = "Configurações";
		include '../include/headPP.inc.php';
	?> 
<body>
	<?php
		$titulo= "Configurações";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
		include '../Include/function.inc.php';

	?>
		
	<div id="container">
		<div id="areaFrm">

			<?php
			include '../Include/connect.inc.php';

			if(isset($_POST['email'])){
				if(!(validate_email($_POST['email'])))
					echo "Email inválido!";
				else{
					$sql = ("mudarEmail_sp '::user','::email'");
					$sql = str_replace('::user',$_SESSION['u'],$sql);
					$sql = str_replace('::email',$_POST['email'],$sql);

					if((!strpos($sql,'DROP'))&&(!strpos($sql,'drop'))){
						$status = sqlsrv_query($conexao,$sql);
						if($status){
							$_SESSION['email']=$_POST['email'];
						}
					}else{
						?>
							<script type="text/javascript">myAlert("texto Inválido no campo preenchido")</script>
						<?php
					}
				}

			}

			if((isset($_POST['senha_ant']))&&(isset($_POST['senha_nova']))&&(isset($_POST['senha_verf']))){

				if(($_POST['senha_ant']=='')||($_POST['senha_nova']=='')||($_POST['senha_verf']=='')){
					//  :)
				}else{
					if($_POST['senha_nova'] == $_POST['senha_verf']){

						if($_POST['senha_ant'] != $_POST['senha_nova']){

							if(testPassword(htmlspecialchars($_POST['senha_nova']))>1){

								$sql = ("login_sp '::user'");
								$sql = str_replace('::user', $_SESSION['u'], $sql);

								$status=sqlsrv_query($conexao,$sql);

								if($dados=sqlsrv_fetch_array($status)){

									$pass_verf=$dados[3];	

									if(password_verify($_POST['senha_ant'],$pass_verf)){

										$stored_pass=password_hash(htmlspecialchars($_POST['senha_nova']),PASSWORD_BCRYPT,array(
														'cost'=>10
													 ));

										$sql = ("mudarSenha_sp '::user','$stored_pass'");
										$sql = str_replace('::user', $_SESSION['u'], $sql);
										
										if((!strpos($sql,'DROP'))&&(!strpos($sql,'drop'))&&(!strpos($sql,'DELETE'))&&(!strpos($sql,'delete'))&&(!strpos($sql,'UPDATE'))&&(!strpos($sql,'update'))){
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
												<script type="text/javascript">myAlert("texto Inválido no campo preenchido")</script>
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
								<script type="text/javascript">myAlert("Senha nova igual a antiga")</script>
							<?php
						}

					}else{
						?>
							<script type="text/javascript">myAlert("Senhas difere da confirmação")</script>
						<?php
					}
				}
			}
			
			?>

			<form method="POST">
				<div class="tituloProjNew"> <p class="tlt">Mudar email:</p></div>
				<input type="text" name="email"
				<?php
					{
						echo "value=".$_SESSION['email']; 
					}
				?> class="respProjNew" maxlength="100">

				<div class="tituloProjNew"> <p class="tlt">Senha antiga:</p></div>
				<input type="password" name="senha_ant" class="respProjNew">

				<div class="tituloProjNew"> <p class="tlt">Senha nova:</p></div>
				<input type="password" name="senha_nova" class="respProjNew">

				<div class="tituloProjNew"> <p class="tlt">Confirmar senha:</p></div>
				<input type="password" name="senha_verf" class="respProjNew">

				<hr>
				<input type="submit" name="vai" value="mudar" class="btnEnviar">
			</form>

		</div>			
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>