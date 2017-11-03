<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaUsuario = sqlsrv_query($conexao,"SELECT * FROM usuario WHERE username = '$nomeUsuario'");
		while ( $linha = sqlsrv_fetch_array( $consultaUsuario, SQLSRV_FETCH_ASSOC)){
			$nome = $linha['nome'];
			$email = $linha['email'];
			$username = $linha['username'];
			$status = $linha['user_status'];
			$especialidade = $linha['especialidade'];
			$perguntasFeitas = $linha['perguntas_feitas'];
			$perguntasRespondidas = $linha['perguntas_respondidas'];
			$projPostado = 0; 
			$urlFoto = "img/".$linha['foto'];
		}
	}
?>