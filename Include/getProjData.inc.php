<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaProj = sqlsrv_query($conexao,"SELECT * FROM projeto WHERE titulo = '$tituloProj'");
		while ($linha = sqlsrv_fetch_array( $consultaProj, SQLSRV_FETCH_ASSOC)){
			$criador = $linha['criador'];
			$descricao = $linha['descricao'];
			$nota = $linha['nota'];
			$nomeArquivo = $linha['proj'];
		}
		if($indexCmn!= 0){
			$consultaComProj = sqlsrv_query($conexao,"SELECT * FROM projComentario WHERE projeto = '$tituloProj' AND codPergunta = $indexCmn");
			while ($linhaCmn = sqlsrv_fetch_array( $consultaProj, SQLSRV_FETCH_ASSOC)){
				$criadorCmn = $linhaCmn['criador'];
				$textoCmn = $linhaCmn['texto'];
				$data = $linhaCmn['data']; 
			}	
		}
		
	}
?>

<!--
create table projeto(
titulo varchar(50) primary key,
descricao ntext,
nota ntext,
criador varchar(25),
constraint fkCriador foreign key(criador) references dbo.usuario(username)
)
-->