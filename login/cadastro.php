<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Cadastro</title>
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
				include("../Include/connect.inc.php");
				include("../Include/function.inc.php");
				if(isset($_POST['username'])&&isset($_POST['senha'])&&isset($_POST['senha_conf'])&&isset($_POST['email'])&&isset($_POST['nome'])){
							 
				if(testPassword(htmlspecialchars($_POST['senha']))>1){
					if (!validate_email($_POST['email'])){
    					echo '<span class="campos" id="msgErro">Email Inválido!</span>';
					}else{
						

						if((!(strpos($_POST['username'],';')))&&(!(strpos($_POST['senha'],';')))&&(!(strpos($_POST['nome'],';')))){

							$username=htmlspecialchars($_POST['username']);							
							$senha=htmlspecialchars($_POST['senha']);
							$email=htmlspecialchars($_POST['email']);
							$nome=htmlspecialchars($_POST['nome']);

							$senha=password_hash($senha,PASSWORD_BCRYPT,array('cost'=>10));

							$sql = "insert into usuario values( '$username','$email','$nome','$senha', 'sem status', 0, 0,'nada', 'img/null.png', 0)";

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
							?> <script>myAlertLogin("Caracteres inválidos")</script> <?php
						}
					}					
				}else{
					?> <script>myAlertLogin("A senha não é forte o suficiente")</script> <?php
				}		

			}else{
				?> <script>myAlertLogin("A senha difere da confirmação")</script> <?php
			}

		}

		?> <br>

			<input type="submit" name="Cadastrar" id="enviar">
		</form>
	</div>

</body>
</html>