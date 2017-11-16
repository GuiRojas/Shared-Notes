<?php
echo"
<div id='profile'>
	<img src='$urlFoto' class='img'>
	<div id='informacoes'>
		<span>";
			if(isset($_SESSION['u'])){
				if($_SESSION['u'] == $_GET['query']){
					echo "<button class='btnEditar'> <img id='edit' src='../imagens/edit.png'>Editar Perfil</button>";
				}	
			}		

			$status = '"'.$status.'"';

			echo "
			Status:<br>
			<div class='campoPerfil'>
				<i>$status</i>
			</div>
			<br><br>
			Especialidade:<br>
			<div class='campoPerfil'>
				$especialidade
			</div>
			<br><br>
			<hr>
			Projetos postados:<br>
			$projPostado<br>
			Perguntas feitas:<br>
			$perguntasFeitas<br>
		</span>
	</div>
</div>
";
?>