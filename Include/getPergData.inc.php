<?php 
	include 'connect.inc.php';
	if ( $conexao){

		$consultaPergunta = sqlsrv_query($conexao,"SELECT titulo, texto, categoria, criador, data FROM pergunta WHERE titulo = '$nomePerg'");
		while ( $linha = sqlsrv_fetch_array( $consultaPergunta, SQLSRV_FETCH_ASSOC)){
			$manchete = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['categoria'];
			$criadorPerg = $linha['criador'];
			$data = $linha['data'];

			$consultaUsuario = sqlsrv_query($conexao,"SELECT foto FROM usuario WHERE username = '$criadorPerg'");

			while ($linha2 = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)) {
				$urlFoto = $linha2['foto'];
			}
		}
	}
?>