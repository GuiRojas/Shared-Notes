<div id="profile">
	<img src="../imagens/fotoPerfil.jpg" class="img">
	<div id="informacoes">
		<span>
			<?php
			if(isset($_SESSION['user'])&& isset($_SESSION['perfilVisitando'])){
				if($_SESSION['perfilVisitando']==$_SESSION['user']){
					echo "<a href='editarPerfil.php'>Editar Perfil</a>";
				}	
			}		
			?>
			Status:<br>
			<i>"gosto de bacalhau e comer café depois da janta"</i><br><br>
			Especialidade: <br>
			PHP<br>
			SQL<br><br>
			<hr>
			<br>
			Perguntas respondidas:<br>
			13<br>
			Perguntas feitas:<br>
			0<br>
			
		</span>
	</div>
</div>