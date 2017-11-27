<?php 
	include 'connect.inc.php';
	$consultaUsuario = sqlsrv_query($conexao,"getUserData_sp '$nomeUsuario'");
	while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
		$nome = $linha['nome'];
		$email = $linha['email'];
		$username = $linha['username'];
		$status = $linha['user_status'];
		$especialidade = $linha['especialidade'];
		$urlFoto = $linha['foto'];
	}
	$cons1 = sqlsrv_query($conexao,"countProj_sp '$nomeUsuario'");
	while ( $linha = sqlsrv_fetch_array( $cons1, SQLSRV_FETCH_ASSOC)){
		$projPostado = $linha['projPost'];
	}
	$cons2 = sqlsrv_query($conexao,"countPerg_sp '$nomeUsuario'");
	while ( $linha = sqlsrv_fetch_array( $cons2, SQLSRV_FETCH_ASSOC)){
		$perguntasFeitas = $linha['pergPost'];
	}
?>



