<?php 
	session_start();
?>
<div id="side">
	<div id="side">
		<div id="contentSide">
			<a href="../home" class="a">Home</a>
			<a href="../Perfis/perfilMenu.php" class="a">Perfis</a> <!--class="aAtivo"-->
			<a href="../Perguntas" class="a">Perguntas</a>
			<a href="../Enciclopedia" class="a">Enciclopédia</a>

			<!--usuario apenas acessa seu perfil se estiver logado-->
			<?php
			if(isset($_SESSION['user'])){
				$user = $_SESSION['user'];
				echo "<a href='../Perfis/igualar.php' class='btnLogin'>";
				echo "<input type='button' class='subgrupo' value='$user'>";
				echo "</a>";
			}
			?>		

			<!--Redireciona pro sobre nós-->
			<a href="../Sobre/index.php">
			<input type="button" class="subgrupo" value="Sobre">
			</a>
			<!-- Como fariamos as config. ? De vdd n sei :p
			<input type="button" class="subgrupo" value="Configurações">
			-->

			<!--Controle de login e sessão-->
			<?php
				if(!isset($_SESSION['user'])){
					echo "<a href='../login/login.php' class='subgrupo'>Entrar</a>";
					echo "<a href='../login/cadastro.php' class='subgrupo'>Cadastrar</a>";
				}else{
					echo "<a href='../login/doLogout.php' class='btnLogin' class='subgrupo'>Sair</a>";
				}		
			?>			 
		</div>
	</div>
</div>