<?php
	$titulo="Site top sem nome";
	session_start();
	//exemplo:
	//$_SESSION['user']='nodya';
	if (isset($_SESSION['user'])){
		$titulo="Site - ".$_SESSION['user'];
	}	

//dps colocar um sistema de pesquisa da pag. do usuario	

	echo "<title>".$titulo."</title>";
	echo "<script src='../jquery-3.2.1.js' type='text/javascript'></script>";
	echo "<script src='../script.js' type='text/javascript'></script>";
	echo "<link rel='stylesheet' type='text/css' href='../siteTesteCSS.css'>";

?>