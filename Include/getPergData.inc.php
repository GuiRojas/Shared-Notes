<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaPergunta = sqlsrv_query($conexao,"SELECT codPergunta,titulo, texto, categoria, criador, data FROM pergunta WHERE titulo = '$titulo'");
		while ( $linha = sqlsrv_fetch_array( $consultaPergunta, SQLSRV_FETCH_ASSOC)){
			$codPergunta = $linha['codPergunta'];
			$manchete = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['categoria'];
			$criador = $linha['criador'];

			$consultaUsuario = sqlsrv_query($conexao,"SELECT foto FROM usuario WHERE username = '$criador'");

			while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC))
				$urlFoto = $linha['foto'];
		}
	}
?>