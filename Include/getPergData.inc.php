<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaUsuario = sqlsrv_query($conexao,"SELECT * FROM pergunta WHERE username = '$nomePerg'");
		while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
			$titulo = $linha['titulo'];
			$texto = $linha['texto'];
			$cat = $linha['cat'];
			$criador = $linha['criador'];
		}
	}
?>