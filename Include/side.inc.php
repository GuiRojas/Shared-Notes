<?php session_start(); ?>
<div id="side">
	<div id="side">
		<div id="contentSide">
			<a href="../home">Home</a>
			<a href="../Perfis">Perfis</a> <!--class="aAtivo"-->
			<a href="../Perguntas">Perguntas</a>
			<a href="../Enciclopedia">Enciclopédia</a>

			<!--usuario apenas acessa seu perfil se estiver logado-->
			<?php
			if(isset($_SESSION['user'])){
				echo "<a href='../perfis/".$_SESSION['user'].".php' class='btnLogin'>";
				echo "<input type='button' class='subgrupo' value='Seu perfil'>";
				echo "</a>";
			}
			?>		

			<!--Redireciona pro sobre nós-->
			<input type="button" class="subgrupo" value="Sobre">
			
			<!-- Como fariamos as config. ? De vdd n sei :p
			<input type="button" class="subgrupo" value="Configurações">
			-->

			<!--Controle de login e sessão-->
			<?php
				if(!isset($_SESSION['user'])){
					echo "<a href='../login/login.php' class='btnLogin'>";
					echo "<input type='button' class='subgrupo' value='Entrar'>";
					echo "</a>";
					echo "<a href='../login/cadastro.php' class='btnLogin'>";
					echo "<input type='button' class='subgrupo' value='Cadastrar'>";
				}else{
					echo "<a href='../login/doLogout.php' class='btnLogin'>";
					echo "<input type='button' class='subgrupo' value='Sair'>";
				}		
				echo "</a>"	
			?>			 
		</div>
	</div>
</div>