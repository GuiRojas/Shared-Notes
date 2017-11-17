<html>
<head>
	<link rel="shortcut icon" href="../Imagens/logoSite.png" />
	<title>Fazer Pergunta</title>
	<link rel="stylesheet" type="text/css" href="../CSS/procuraPerfil.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
	<style type="text/css">

	#cat{
		margin-left: 15px;
	}
	</style>
</head>
<body>
	<?php
		$titulo= "Perguntas";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
			
		if((isset($_POST['titulo']))&&(isset($_POST['cat']))&&(isset($_POST['perg']))){

			$titulo = htmlspecialchars($_POST['titulo']);
			$cat = htmlspecialchars($_POST['cat']);
			$perg = htmlspecialchars($_POST['perg']);

			$user = $_SESSION['u'];

			include '../include/connect.inc.php';

			$sql = ("addPerg_sp '$titulo','$perg','$cat','$user'");

			$status = sqlsrv_query($conexao,$sql);

			if($status){
				$_SESSION['pergFeita'] = true;
				header("Location:perg.php?query=$titulo");
				//no futuro, redirecionar à pag da pergunta
			}else{
				echo '<span class="campos" id="msgErro">Não foi possível incluir a pergunta</span><br>';
			}
		}
	?>
		
	<div id="container">
		<form method="POST" id="formPerg">
			<div class="tituloProjNew"> <p class="tlt">Título:</p>
				<div style="display: inline-block;" id="hint1">
					<img src="../Imagens/hint.png" class="hint">
				</div>
				<div id="hintTxt1" class="hintTxt">
					<p class="descHint">Título da pergunta. Não pode ser igual ao de nenhuma outra pergunta registrada no site.</p>
				</div>
			</div>
			<input class="respProjNew" type="text" name="titulo" maxlength="30" id="tituloPerg" style="width: 60%; margin-left: 15px;"><br><br>

			<div class="tituloProjNew"><p class="tlt">Pergunta:</p>
				<div style="display: inline-block;" id="hint2">
					<img src="../Imagens/hint.png" class="hint">
				</div>
				<div id="hintTxt2" class="hintTxt">
					<p class="descHint">Sua pergunta. Explique o por que da dúvida.</p>
				</div>
			</div><br>
			<textarea name="perg" style="max-height: 110px; max-width: 70%; width: 60%; height: 110px;margin-left: 15px;" id="descPerg" maxlength="400"></textarea><br><br>

			<div class="tituloProjNew"><p class="tlt">Categoria:</p>
				<div style="display: inline-block;" id="hint3">
					<img src="../Imagens/hint.png" class="hint">
				</div>
				<div id="hintTxt3" class="hintTxt">
					<p class="descHint">Selecione de qual categoria a sua pergunta mais se encaixa.</p>
				</div>
			</div><br>

			<select name="cat" id="cat" class="campo">
				<option>Conceitual</option>
				<option>PHP</option>
				<option>JavaScript</option>
				<option>SQL Server</option>
				<option>MySQL</option>
				<option>Java</option>
				<option>Pascal</option>
				<option>C</option>
				<option>C#</option>
				<option>C++</option>
			</select>
			<hr>

			<input type="button" name="" id="fakeEnviar" value="Enviar" onclick="checarCamposPerg()">
			<input type="submit" name="Logar" id="enviar" style="display: none">	
						
		</form>

	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>