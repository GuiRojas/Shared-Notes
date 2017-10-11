<?php
//$servidor = "regulus.cotuca.unicamp.br";
$servidor = "DESKTOP-TITAN\SQLEXPRESS"; //mude se estiver em outro server, grato
$database="BDPPI17182";
$uid = "BDPPI17182";
$pwd = "BDPPI17182";

$InfConexao = array( "Database"=>$database,
						 "PWD"=>$pwd,
						 "UID"=>$uid);

$conexao = sqlsrv_connect($servidor,$InfConexao);

if(!$conexao){ 
     echo "A conexão não pode se concretizar. <br>";
     die( print_r( sqlsrv_errors(), true));
}
?>