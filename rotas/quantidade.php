<?php 

	session_start();



	if(isset($_GET['id']) && $_GET['key'] == "mais"){
		$idQuant = $_GET['id'];

		if($_SESSION['car'][$idQuant] < 10){
			$_SESSION['car'][$idQuant] += 1;
		}
		header("Location:../carrinho.php");
		exit();		

	}

	if(isset($_GET['id']) && $_GET['key'] == "menos"){
		$idQuant = $_GET['id'];

		if($_SESSION['car'][$idQuant] != 0){

			$_SESSION['car'][$idQuant] -= 1;

			if($_SESSION['car'][$idQuant] == 0){
				$_SESSION['idQuant'] = $idQuant;
				Header("Location:remove.php");
				exit();
			}

		}

		header("Location:../carrinho.php");
		exit();		

	}

 ?>