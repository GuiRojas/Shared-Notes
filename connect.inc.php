<?php
$servidor = "regulus.cotuca.unicamp.br";
$uid = "BDPPI17182";
$pwd = "BDPPI17182";
$database="BDPPI17182";
$InfConexao = array( "Database"=>$database,
						 "PWD"=>$pwd,
						 "UID"=>$uid);

$conexao = sqlsrv_connect($servidor,$InfConexao);

if(!$conexao){ 
	exit("Falha na conexão :c");
}
?>