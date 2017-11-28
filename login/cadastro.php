<!DOCTYPE html>
<html>
	<?php
		$title = "Cadastro";
		include '../include/headCD.inc.php';
	?> 
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
			<input class="camposInput" type="password" name="senha" maxlength="25"><br>
			<span class="campos">Confirmar senha:</span><br>
			<input class="camposInput" type="password" name="senha_conf" maxlength="25"><br>
			<span class="campos">Email:</span><br>
			<input class="camposInput" type="text" name="email" maxlength="100"><br>
			<span class="campos">Nome:</span><br>
			<input class="camposInput" type="text" name="nome" maxlength="50" ><br>

			<span class="campos"><a href="login.php">Já tem uma conta? Entre aqui.</a></span><br>	

			<?php 
				include("../Include/connect.inc.php");
				include("../Include/function.inc.php");
				
				if (isset($_POST['Cadastrar'])) {
					
					if(isset($_POST['username'])&&isset($_POST['senha'])&&isset($_POST['senha_conf'])&&isset($_POST['email'])&&isset($_POST['nome'])){
						if(testPassword($senha=htmlspecialchars($_POST['senha']))){
							if (!validate_email($_POST['email'])){
		    					?> <script>myAlertLogin("Email inválido")</script> <?php
							}else{
								if((!(strpos($_POST['username'],';')))&&(!(strpos($_POST['senha'],';')))&&(!(strpos($_POST['nome'],';')))){

									$username=htmlspecialchars($_POST['username']);							
									$email=htmlspecialchars($_POST['email']);
									$nome=htmlspecialchars($_POST['nome']);

									$senha=password_hash($senha,PASSWORD_BCRYPT,array('cost'=>10));

									$sql = "cadastro_sp '$username', '$email', '$nome', '$senha'";

									if((!strpos($sql,'DROP'))&&(!strpos($sql,'drop'))&&(!strpos($sql,'DELETE'))&&(!strpos($sql,'delete'))&&(!strpos($sql,'UPDATE'))&&(!strpos($sql,'update'))){
										$status = sqlsrv_query( $conexao, $sql);

										if($status){
											session_start();
											$_SESSION['u']=$username;
											$_SESSION['firstTime']= true;
											$_SESSION['email']=$email;
											header('Location:../Home/index.php');
										}else{
											?> <script>myAlertLogin("Não foi possível realizar a inclusão")</script> <?php
										}											
									}else{
										?>
											<script type="text/javascript">myAlert("texto Inválido no campo preenchido")</script>
										<?php
									}
									
								}else{
									?> <script>myAlertLogin("Caracteres inválidos")</script> <?php
								}
							}					
						}else{
							?> <script>myAlertLogin("A senha não é forte o suficiente")</script> <?php
						}		
					}else{
						?> <script>myAlertLogin("A senha difere da confirmação")</script> <br>
						<?php }} ?>
			<input type="submit" name="Cadastrar" id="enviar">
		</form>
	</div>

</body>
</html>