<?php 

	session_start();
	include('conect.php');

	if(isset($_POST["btn_alter_fun"])){

		$id = $_SESSION['id_alt'];

		$nome_alt = htmlentities($_POST['nome_alt']);
		$sobNome_alt = htmlentities($_POST['sobNome_alt']);
		$cargo_alt = htmlentities($_POST['cargo_alt']);
		$email_alt = htmlentities($_POST['email_alt']);
		$senha_alt = htmlentities($_POST['senha_alt']);

		$mysqli->query("update login_fun set nome_fun = '$nome_alt', sobNome_fun = '$sobNome_alt', cargo = '$cargo_alt', email_fun = '$email_alt', senha = '$senha_alt' where id_fun = '$id' ");
		echo $mysqli->error;

		if ($mysqli->error == "") {
			Header("Location:../rh.php");
			exit();
		}

	}else if(isset($_POST['btn_reset'])){
		Header("Location:../rh.php");
		exit();
	}
		
?>