<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaUsuario = sqlsrv_query($conexao,"SELECT titulo, texto, categoria, criador, data FROM pergunta WHERE titulo = '$titulo'");
		while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
			$manchete = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['categoria'];
			$criador = $linha['criador'];

		}
	}
?>