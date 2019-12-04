<?php 

	session_start();
	include('conect.php');


	// LOGIN DO CLIENTE

	if(isset($_POST['btn_login_cli'])){

		// CHECA SE OS CAMPOS FORAM PREENCHIDO 
		if(empty($_POST['email_cli']) || empty($_POST['senha_cli'])) {
		 	// SE NAO. VOLTA PARA A PAGINA E ENCERRA SESSAO
			Header('Location: login_cli.php');
			exit();
		}else{

			// CRIA AS VARIAVEIS
			$email = htmlentities($_POST['email_cli']);
			$senha = htmlentities($_POST['senha_cli']);

			// DA UM INSERT NA TABELA
			$consulta = $mysqli->query("select * from login_cli where email_cli = '$email' and senha_cli= '$senha'");
			$linha_cli = $consulta->fetch_assoc();
			$id = $linha_cli["id_cli"];
			$user_cli = $linha_cli["user"];

			if ($consulta->num_rows == 1){
				$_SESSION['usuario'] = $email;
				$_SESSION['id'] = $id;
				$_SESSION['user'] = $user_cli;
				Header("Location:../index.php");
				exit();
			}else{
				header('Location: ../login_cli.php');
				exit();
			}
		}

	}

	// LOGIN DO FUNCIONARIO

	if(isset($_POST['btn_login_fun'])){

		// CHECA SE OS CAMPOS FORAM PREENCHIDO 
		if(empty($_POST['email_fun']) || empty($_POST['senha_fun'])) {

		 	// SE NAO. VOLTA PARA A PAGINA E ENCERRA SESSAO
			Header('Location: ../login_funcionario.php');
			exit();
		}else{

			// CRIA AS VARIAVEIS
			$email_fun = htmlentities($_POST['email_fun']);
			$senha_fun = htmlentities($_POST['senha_fun']);

			// DA UM INSERT NA TABELA
			$consulta_fun = $mysqli->query("select * from login_fun where email_fun = '$email_fun' and senha= '$senha_fun'");
			$linha_fun = $consulta_fun->fetch_assoc();
			$id_fun = $linha_fun["id_fun"];
			$user_fun = $linha_fun["user"];

			if ($consulta_fun->num_rows == 1){
				$_SESSION['usuario'] = $email_fun;
				$_SESSION['id'] = $id_fun;
				$_SESSION['user'] = $user_fun;
				Header("Location:../index.php");
				exit();
			}else{
				header('Location: ../login_funcionario.php');
				exit();
			}
		}

	}
	
 ?>