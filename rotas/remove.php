<?php 
	session_start();

	$idQuant = $_SESSION['idQuant'];

	if(isset($_GET['id'])){
		$id = $_GET['id'];


		unset($_SESSION['car'][$id]);
		Header("Location:../carrinho.php");
		exit();
	}

	if(isset($idQuant)){

		unset($_SESSION['car'][$idQuant]);
		Header("Location:../carrinho.php");
		exit();
	}	

 ?>