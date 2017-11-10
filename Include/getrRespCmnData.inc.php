<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$qtd = 0;
		$consultaResposta = sqlsrv_query($conexao,"SELECT Projeto,criador,texto FROM projComentario WHERE projeto = '$tituloProj' ORDER BY data") or die(print_r(sqlsrv_errors()));
		while ( $linha = sqlsrv_fetch_array( $consultaResposta, SQLSRV_FETCH_ASSOC)){
			$Projeto = $linha['Projeto'];
			$criador = $linha['criador'];
			$texto   = $linha['texto'  ];

			$qtd = $qtd + 1;
		}

	}
?>