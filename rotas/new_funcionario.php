<?php 
	session_start();
	include('conect.php');

	if (isset($_POST['btn_new_fun'])) {
		

		if(empty($_POST['nome_fun']) || empty($_POST['sobNome_fun']) || empty($_POST['cargo']) || empty($_POST['email']) || empty($_POST['senha'])){
			echo "erro";
		}else{

			$nome_fun = htmlentities($_POST['nome_fun']);
			$sobNome_fun = htmlentities($_POST['sobNome_fun']);
			$cargo = htmlentities($_POST['cargo']);
			$email = htmlentities($_POST['email']);
			$senha = htmlentities($_POST['senha']);


			$mysqli->query("insert into login_fun values('','$nome_fun','$sobNome_fun','$email','$senha','admin','$cargo')");
			echo $mysqli->error;

			if ($mysqli->num_rows > 0){
				Header("location:../rh.php");
			}else{
				header('Location: ../rh.php');
				exit();
			}

		}
	}

 ?>





