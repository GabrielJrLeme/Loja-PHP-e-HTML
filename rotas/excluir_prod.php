<?php 

	session_start();
	include('conect.php');


	if(isset($_GET["excluir"])){

		$id = htmlentities($_GET["excluir"]);
		
		$mysqli->query("delete from produtos where id = '$id'");
		echo $mysqli->error;

		if ($mysqli->error==""){
			Header("Location:../estoque.php");
			exit();
		}

	}


?>