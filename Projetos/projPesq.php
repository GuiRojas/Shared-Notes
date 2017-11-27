<html>
	<?php
		$title = "Procurar Projetos";
		include '../include/headPP.inc.php';
	?> 
<body>
	<?php	
		$titulo= "Pesquisar projetos";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>

	<div id="container">
		<form method="GET">
			<div id="procuraUsuario">
					<div>
						<input type="text" id="query" name="query">
					</div>
					<div>
						<input type="submit" id="btnInput" value="">	
					</div>					
			</div>
		</form>
		
		<?php
			include("../Include/connect.inc.php");

			if(isset($_GET['query'])){

				$query = htmlspecialchars($_GET['query']);
				if( $query != null or $query != ""){

			        $qtd = 0;
			        $consultaProjeto = sqlsrv_query($conexao, "searchProj_sp '$query'") or die(print_r(sqlsrv_errors()));
			        while ( $linha = sqlsrv_fetch_array( $consultaProjeto, SQLSRV_FETCH_ASSOC))
						$qtd = $qtd + 1;
					

					if ( $qtd > 0) { 
						$consulta = (sqlsrv_query($conexao,"searchProj_sp '$query'"));
						while ( $dadosProj = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC)){
							echo "<a class='usuDataA' href='pagProj.php?query=".$dadosProj['titulo']."'>

				        	<div class='usuData'>
								<div class='nomeEFoto'>".$dadosProj['titulo']."</div>
								<div class='linhaVertical'>".$dadosProj['criador']."</div>
								<div class='info'></div>
							</div>
			        	</a>";
			        	}
			        	echo "<br><br>";
			        } else {
				        ?> <script>myAlert("Projeto \"<?php  echo"$query"  ?>\" não encontrado.")</script> <?php
				    }
		        }
			}
		?>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>