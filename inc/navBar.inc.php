<div id="side">
	<div id="contentSide">
		<a href="#">Home</a>
		<a href="#" class="aAtivo">Perfis</a>
		<a href="#">Perguntas</a>
		<a href="#">Enciclopédia</a>
		<a href="#">Linguagens:</a>
		<a href="#" id="linguagem">JavaScript</a>
		<a href="#" id="linguagem">CSS</a>
		<a href="#" id="linguagem">HTML</a>
		<a href="#" id="linguagem">Java</a>
		<a href="#" id="linguagem">SQL</a>
		<a href="#" id="linguagem">PHP</a>
		<a href="#" id="linguagem">Pascal</a>
		<a href="#" id="linguagem">...</a>
		<a href="#" id="linguagem">...</a>
		<input type="button" class="subgrupo" value="Sobre">
		<input type="button" class="subgrupo" value="Configurações">

		<?php
			if(basename($_SERVER['PHP_SELF'])==="home.php")
				echo "<a href='login/doLogout.php'>";
			else
				echo "<a href='../login/doLogout.php'>";
		?>
		
			<input type="button" class="subgrupo" value="Sair" onclick="logout()">
		</a>"
	</div>
</div>