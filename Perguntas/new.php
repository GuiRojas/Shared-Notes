<?php
session_start();

if((isset($_POST['titulo']))&&(isset($_POST['cat']))&&(isset($_POST['perg']))){

	$titulo = htmlspecialchars($_POST['titulo']);
	$cat = htmlspecialchars($_POST['cat']);
	$perg = htmlspecialchars($_POST['perg']);

	$user = $_SESSION['u'];

	include '../include/connect.inc.php';

	$sql = ("addPerg_sp '$titulo','$perg','$cat','$user'");

	$status = sqlsrv_query($conexao,$sql);

	if($status){
		echo "Pergunta feita com sucesso";
	}else{
		echo "Não foi possivel incluir a pergunta";
	}


}else{
	echo "preencha o formulario inteiro";
}



?>