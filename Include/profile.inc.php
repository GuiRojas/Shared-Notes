<?php
echo"
<div id='profile'>
	<img src='$urlFoto' class='img'>
	<div id='informacoes'>
		<span>";
			if(isset($_SESSION['u'])){
				if($_SESSION['u'] == $_GET['query']){
					echo "<a href='../Perfis/editar.php?pe=$_SESSION[u]' id='btnEditar'> <img id='edit' src='../imagens/edit.png'>Editar Perfil</a>";
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