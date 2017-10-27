<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaUsuario = sqlsrv_query($conexao,"SELECT titulo, texto, categoria, criador FROM pergunta WHERE titulo = '$nomePerg'");
		while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
			$titulo = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['categoria'];
			$criador = $linha['criador'];
		}
	}
?>