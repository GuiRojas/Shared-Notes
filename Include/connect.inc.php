<?php
$servidor = "regulus.cotuca.unicamp.br";
$database="BDPPI17182";
$uid = "BDPPI17182";
$pwd = "StSn17182";
$InfConexao = array( "Database"=>$database,
						 "PWD"=>$pwd,
						 "UID"=>$uid);

$conexao = sqlsrv_connect($servidor,$InfConexao);

if(!$conexao){ 
     echo "A conexão não pode se concretizar. <br>";
     die( print_r( sqlsrv_errors(), true));
}
?>