<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaUsuario = sqlsrv_query($conexao,"SELECT titulo as titulo,texto as texto,categoria as cat,criador as criador FROM pergunta WHERE titulo = '$nomePerg'");
		while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
			$titulo = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['cat'];
			$criador = $linha['criador'];
		}
	}
?>