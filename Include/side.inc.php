<?php 
	session_start();
?>
<div id="side">
	<div id="side">
		<div id="contentSide">
			<a href="../home" class="a">Home</a> <!--class="aAtivo"-->
			<?php
				if(isset($_SESSION['u'])){
					$user = $_SESSION['u'];
					echo "<a href='#' class='a'>Projetos</a>";
				}
			?>

			<a href="../Perfis/perfilMenu.php" class="a">Perfis</a>
			<?php
				if(isset($_SESSION['u'])){
					$user = $_SESSION['u'];
					echo "<a href='#' class='aSub'>Amigos</a>";
				}
			?>
			<a href="../Perguntas" class="a">Perguntas</a>			

			<!--usuario apenas acessa seu perfil se estiver logado-->
			<?php
			if(isset($_SESSION['u'])){
				echo "<a href='../Perfis/index.php?query=$_SESSION[u]' class='btnLogin subgrupo'>$_SESSION[u]</a>";
			}
			?>		

			<!--Redireciona pro sobre nós-->
			<a href="../Sobre/index.php" class="subgrupo">Sobre</a>			
			<!-- Como fariamos as config. ? De vdd n sei :p
			<input type="button" class="subgrupo" value="Configurações">
			-->

			<!--Controle de login e sessão-->
			<?php
				if(!isset($_SESSION['u'])){
					echo "<a href='../login/login.php' class='subgrupo'>Entrar</a>";
					echo "<a href='../login/cadastro.php' class='subgrupo'>Cadastrar</a>";
				}else{
					echo "<a href='../login/doLogout.php' class='btnLogin subgrupo'>Sair</a>";
				}		
			?>			 
		</div>
	</div>
</div>