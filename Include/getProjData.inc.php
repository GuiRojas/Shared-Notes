<?php 
	include 'connect.inc.php';
	if ( $conexao){
		$consultaProj = sqlsrv_query($conexao,"SELECT * FROM projeto WHERE titulo = '$titulo_proj'");
		while ( $linha = sqlsrv_fetch_array( $consultaProj, SQLSRV_FETCH_ASSOC)){
			$titulo = $linha['titulo'];
			$criador = $linha['criador'];
			$descricao = $linha['descricao'];
			$nota = $linha['nota'];
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
alter table projeto add proj ntext
-->