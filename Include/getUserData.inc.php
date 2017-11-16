<?php 
	include 'connect.inc.php';
	$consultaUsuario = sqlsrv_query($conexao,"SELECT nome AS nome,email AS email,username AS username,user_status AS user_status,especialidade AS especialidade,foto as foto FROM usuario WHERE username = '$nomeUsuario';SELECT count(titulo) AS projPost FROM projeto WHERE criador = '$nomeUsuario'");
	while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
		$nome = $linha['nome'];
		$email = $linha['email'];
		$username = $linha['username'];
		$status = $linha['user_status'];
		$especialidade = $linha['especialidade'];
		$urlFoto = $linha['foto'];
	}
	$cons1 = sqlsrv_query($conexao,"SELECT count(titulo) AS projPost FROM projeto WHERE criador = '$nomeUsuario'");
	while ( $linha = sqlsrv_fetch_array( $cons1, SQLSRV_FETCH_ASSOC)){
		$projPostado = $linha['projPost'];
	}
	$cons2 = sqlsrv_query($conexao,"SELECT count(titulo) AS pergPost FROM pergunta WHERE criador = '$nomeUsuario'");
	while ( $linha = sqlsrv_fetch_array( $cons2, SQLSRV_FETCH_ASSOC)){
		$perguntasFeitas = $linha['pergPost'];
	}
?>



