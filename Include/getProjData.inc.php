<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaProj = sqlsrv_query($conexao,"SELECT * FROM projeto WHERE codProjeto = '$codProjeto'");
		while ( $linha = sqlsrv_fetch_array( $consultaProj, SQLSRV_FETCH_ASSOC)){
			$titulo = $linha['titulo'];
			$criador = $linha['username'];
			$descricao = $linha['descricao'];
			$nota = $linha['nota'];
		}
	}
?>