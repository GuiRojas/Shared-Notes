<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaResposta = sqlsrv_query($conexao,"getRespData $codPergunta");
		while ( $linha = sqlsrv_fetch_array( $consultaResposta, SQLSRV_FETCH_ASSOC)){
			$userResp = $linha['username'];
			$dataResp = $linha['data'];
			$txtResp  = $linha['texto'];


			/*
			$fotoResp = sqlsrv_query($conexao,"SELECT foto FROM usuario WHERE username = '$userResp'");

			while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC))
				$urlFotoResp = $linha['foto'];
			*/
		}
		/*//pega o nº de resp 
		$consultaResposta = sqlsrv_query($conexao,"SELECT count(codComentario) AS numCom FROM comentario WHERE ccodPergunta = '$codPergunta'");
		while ( $linha = sqlsrv_fetch_array( $consultaResposta, SQLSRV_FETCH_ASSOC)){
			$numCom = $linha['numCom'];
		}*/
	}
?>