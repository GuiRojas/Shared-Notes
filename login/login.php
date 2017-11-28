<!DOCTYPE html>
<html>
	<?php
		$title = "Login";
		include '../include/headCD.inc.php';
	?> 
<body>
	<?php
		include '../include/tituloCadastro.inc.php'
	?>
	<h1>Login</h1>
	<div id="cadastro">
		<form action="login.php" method="POST">
			<span class="campos">Nome de Usuario:</span><br/>
			<input type="text" class="camposInput" name="username" maxlength="25" id="nomeLogin" ><br/><br>
			<span class="campos" type="password">Senha:</span><br/>
			<input type="password" class="camposInput" name="senha" maxlength="25" id="senhaLogin" ><br/><br>
			<span class="campos"><a href="cadastro.php">Não tem uma conta? cadastre-se aqui.</a></span><br>

		<?php
			if(isset($_POST['username'])&&isset($_POST['senha'])){
				include("../Include/connect.inc.php");

				$username=htmlspecialchars($_POST['username']);
				$senha=htmlspecialchars($_POST['senha']);

				$sql=("login_sp '$username'");


				if((!strpos($sql,'DROP'))&&(!strpos($sql,'drop'))&&(!strpos($sql,'DELETE'))&&(!strpos($sql,'delete'))&&(!strpos($sql,'UPDATE'))&&(!strpos($sql,'update'))){
					$status=sqlsrv_query($conexao,$sql);

					if($dados=sqlsrv_fetch_array($status)){
						$pass_verf=$dados[3];
						$email=$dados[1];
						if(password_verify($senha,$pass_verf)){
							session_start();
							$_SESSION['u'] = $username;
							$_SESSION['email'] = $email;
							header('Location:../Home/index.php');
						}else{
							?>
							<script>myAlertLogin("Senha errada");</script>
							<?php
						}
					}else{
						?>
						<script>myAlertLogin("Usuario inexistente")</script>
						<?php
					}

				}else{
					?>
						<script type="text/javascript">myAlert("texto Inválido no campo preenchido")</script>
					<?php
				}
				
			}

		?>

		<input type="submit" name="Logar" id="enviar">
		</form>
	</div>
</body>
</html>