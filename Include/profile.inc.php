<?php
echo"
<div id='profile'>
	<img src='$urlFoto' class='img'>
	<div id='informacoes'>
		<span>";
			if(isset($_SESSION['user']) && isset($_SESSION['perfilVisitando'])){
				if($_SESSION['perfilVisitando']==$_SESSION['user']){
					echo "<a href='editarPerfil.php' id='btnEditar'> <img id='edit' src='../imagens/edit.png'>Editar Perfil</a>";
				}	
			}		

			echo "
			Status:<br>
			<i>'$status'</i><br><br>
			Especialidade:<br>
			$especialidade<br><br>
			<hr>
			Perguntas respondidas:<br>
			$perguntasRespondidas<br>
			Perguntas feitas:<br>
			$perguntasFeitas<br>
		</span>
	</div>
</div>
";
?>