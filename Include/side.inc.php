<?php 
	session_start();
?>
<div id="side">
	<div id="contentSide">
		<a href="../home" class="a" id="homeDiv">Home</a> <!--class="aAtivo"-->
		<a href='../Projetos' class='a' id="projetoDiv">Projetos</a>
		<?php

			if(isset($_SESSION['u'])){
				$user = $_SESSION['u'];
				?><a href='../Projetos/projNew.php' class='aSub'>Postar um projeto</a><?php
			}
		?>

		<a href="../Perguntas" class="a" id="perguntaDiv">Perguntas</a>		
		<?php

			if(isset($_SESSION['u'])){
				$user = $_SESSION['u'];
				?><a href='../Perguntas/prg_new.php' class='aSub' >Fazer uma pergunta</a><?php
			}
		?>	

		<a href="../Perfis/perfilMenu.php" class="a" id="perfilDiv">Perfis</a>

		<!--usuario apenas acessa seu perfil se estiver logado-->
		<?php
			if(isset($_SESSION['u'])){
				?><a href='../Perfis/index.php?query=<?php echo"$_SESSION[u]" ?>' class='btnLogin subgrupo'><?php echo"$_SESSION[u]" ?></a>
				<a href='../config/' class='btnLogin subgrupo' id="configDiv">Configurações da conta</a><?php
			}

			if(!isset($_SESSION['u'])){
				echo "<a href='../login/login.php' class='subgrupo'>Entrar</a>";
				echo "<a href='../login/cadastro.php' class='subgrupo'>Cadastrar</a>";
			}else{
				echo "<a href='../login/intermedioLogout.php' class='btnLogin subgrupo'>Sair</a>";
			}		
		?>			 
	</div>
</div>

<script type="text/javascript">
	url = window.location.href;

	if( url.indexOf("/home/") >= 0 ){
		document.getElementById("homeDiv").className += " atual";
	}

	if( url.indexOf("/Projetos/") >= 0 ){
		document.getElementById("projetoDiv").className += " atual";
	}

	if( url.indexOf("/Perguntas/") >= 0 ){
		document.getElementById("perguntaDiv").className += " atual";
	}

	if( url.indexOf("/config/") >= 0 ){
		document.getElementById("configDiv").className += " atual";
	}

	if( url.indexOf("/Perfis/") >= 0 ){
		document.getElementById("perfilDiv").className += " atual";
	}

</script>