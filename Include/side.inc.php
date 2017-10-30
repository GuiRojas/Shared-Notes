<?php 
	session_start();
	$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<div id="side">
	<div id="contentSide">
		<a href="../home" class="a"
		<?php
			if (strpos($url,'home') !== false) {
				echo " id='atual'";
			}	
		?>
		>Home</a> <!--class="aAtivo"-->
		<a href='../Projetos' class='a'
		<?php
		if (strpos($url,'Projetos') !== false) {
			echo " id='atual'";
		}
		?>
		>Projetos</a>
		<?php

			if(isset($_SESSION['u'])){
				$user = $_SESSION['u'];
				echo "<a href='../Projetos/projNew.php' class='aSub' ";
				if (strpos($url,'projNew') !== false) {
					echo "id='atual'";
				}
				echo ">Postar um projeto</a>";
			}
		?>

		<a href="../Perfis/perfilMenu.php" class="a"
		<?php
		if (strpos($url,'Perfis') !== false) {
			echo " id='atual'";
		}
		?>
		>Perfis</a>
		<a href="../Perguntas" class="a"
		<?php
		if (strpos($url,'Perguntas') !== false) {
			echo " id='atual'";
		}
		?>
		>Perguntas</a>			

		<!--usuario apenas acessa seu perfil se estiver logado-->
		<?php
		if(isset($_SESSION['u'])){
			echo "<a href='../Perfis/index.php?query=$_SESSION[u]' class='btnLogin subgrupo'>$_SESSION[u]</a>";
			echo "<a href='../config/' class='btnLogin subgrupo'>Configurações</a>";
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