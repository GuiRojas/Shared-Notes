<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title><?php echo "Projeto"; ?></title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php
		$titulo= "Postar um projeto";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>
	<div id="container">
		<div id="areaFrm">
			<form method="POST" id="formProj" action="salvarProj.php" enctype="multipart/form-data">
				
				<div class="tituloProjNew"> <p class="tlt">Título:</p>
					<div style="display: inline-block;" id="hint1">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt1" class="hintTxt">
						Nome do seu projeto. Não pode ser igual ao de nenhum outro projeto registrado no site.
					</div>
				</div>
				<input class="respProjNew" type="text" id="tituloProj" name="titulo" maxlength="30" autofocus="true" style="width: 60%;"><br><br>
				
				<div class="tituloProjNew"><p class="tlt">Descrição:</p>
					<div style="display: inline-block;" id="hint2">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt2" class="hintTxt">
						Descrição do seu projeto. Explique como ele funciona e qual a ideia por trás dele.
					</div>
				</div>
				<textarea class="respProjNew" type="text" id="descProj" name="descricao" style="max-height: 150px; max-width: 70%; width: 60%; height: 150;"></textarea><br><br>
				
				<div class="tituloProjNew"><p class="tlt">Nota do criador:</p>
					<div style="display: inline-block;" id="hint3">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt3" class="hintTxt">
						Explique aqui se seu projeto precisa de outros softwares para funcionar (opcional).
					</div>
				</div>
				<input class="respProjNew" type="text" name="nota" id="nota" style="width: 60%;"><br><br>
				
				<div class="tituloProjNew"> <p class="tlt">Arquivo:</p>
					<div style="display: inline-block;" id="hint4">
						<img src="../Imagens/hint.png" class="hint">
					</div>
					<div id="hintTxt4" class="hintTxt">
						Escolha o arquivo que será o projeto. Apenas arquivos com as extensões txt, zip, rar, js, html e php serão aceitos.
					</div>
				</div>
				<input id="arqProj" style="margin-left: 10px; margin-top: 5px;" type="file" accept=".txt, .zip, .rar, .js, .html, .php" name="file" value="escolher arquivo"><br><br>

				<hr><br>
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