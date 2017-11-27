<?php 
	include 'connect.inc.php';
	if ( $conexao){

		$consultaPergunta = sqlsrv_query($conexao,"consultaPergunta_sp $titulo");
		while ( $linha = sqlsrv_fetch_array( $consultaPergunta, SQLSRV_FETCH_ASSOC)){
			$manchete = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['categoria'];
			$criadorPerg = $linha['criador'];
			$data = $linha['data'];

			$consultaUsuario = sqlsrv_query($conexao,"getUserPhoto_sp '$criadorPerg'");

			while ($linha2 = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)) {
				$urlFoto = $linha2['foto'];
			}
		}
	}
?>