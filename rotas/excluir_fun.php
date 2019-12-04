<?php 

	session_start();
	include('conect.php');


	if(isset($_GET["excluir"])){

		$id = htmlentities($_GET["excluir"]);
		
		$mysqli->query("delete from login_fun where id_fun = '$id'");
		echo $mysqli->error;

		if ($mysqli->error==""){
			Header("Location:../rh.php");
		}

	}


?>