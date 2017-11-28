<html>
	<?php
		$title = "Postar Projeto";
		include '../include/headPP.inc.php';
	?> 
<body>
	<?php
		$titulo = 'Postar projeto';
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
	<div id="container">
		<div id="areaFrm">
			<form method="POST" id="formProj" action="salvarProj.php" enctype="multipart/form-data" style="display: block;">
				
				<div class="tituloProjNew"> <p class="tlt">Título:</p>
					<div style="display: inline-block;" id="hint1">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt1" class="hintTxt">
						<p class="descHint">Nome do seu projeto. Não pode ser igual ao de nenhum outro projeto registrado no site.</p>
					</div>
				</div>
				<input class="respProjNew" type="text" id="tituloProj" name="titulo" maxlength="50" autofocus="true" style="width: 60%;"><br><br>
				
				<div class="tituloProjNew"><p class="tlt">Descrição:</p>
					<div style="display: inline-block;" id="hint2">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt2" class="hintTxt">
						<p class="descHint">Descrição do seu projeto. Explique como ele funciona e qual a ideia por trás dele.</p>
					</div>
				</div>
				<textarea class="respProjNew" type="text" id="descProj" name="descricao" style="max-height: 110px; max-width: 70%; width: 60%; height: 110px;" maxlength="250"></textarea><br><br>
				
				<div class="tituloProjNew"><p class="tlt">Nota do criador:</p>
					<div style="display: inline-block;" id="hint3">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt3" class="hintTxt">
						<p class="descHint">Explique aqui se seu projeto precisa de outros softwares para funcionar (opcional).</p>
					</div>
				</div>
				<input class="respProjNew" type="text" name="nota" id="nota" maxlength="100" style="width: 60%;"><br><br>
				
				<div class="tituloProjNew"> <p class="tlt">Arquivo:</p>
					<div style="display: inline-block;" id="hint4">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt4" class="hintTxt">
						<p class="descHint">Escolha o arquivo que será o projeto. Apenas arquivos com as extensões zip, rar e 7z serão aceitos.</p>
					</div>
				</div>
				<input id="arqProj" style="margin-left: 10px; margin-top: 5px;" type="file" accept=".7z, .zip, .rar" name="file" value="escolher arquivo"><br>

				<hr>
				<input type="button" name="" id="fakeEnviar" value="Enviar" onclick="checarCamposProj()">
				<input type="submit" name="Postar" id="env" style="display: none;">

			</form>
		</div>
	</div>

	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>