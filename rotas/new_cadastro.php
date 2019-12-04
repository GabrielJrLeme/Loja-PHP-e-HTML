<?php 
	
	session_start();
	include('conect.php');

	// RECEBE O SINAL DO BOTAO
	if(isset($_POST['btn'])){


		if(empty($_POST['nome']) || empty($_POST['sobNome']) || empty($_POST['email']) || empty($_POST['senha'])){

			// SE NAO. VOLTA PARA A PAGINA E ENCERRA SESSAO
			Header('Location: ../cadastro_cli.php');
			exit();
		}else{
			

			// CRIA AS VARIAVEIS
			$nome = htmlentities($_POST['nome']);
			$sobNome = htmlentities($_POST['sobNome']);
			$email = htmlentities($_POST['email']);
			$senha = htmlentities($_POST['senha']);

			// DA UM INSERT NA TABELA
			$mysqli->query("insert into login_cli values('','$nome','$sobNome','$email','$senha','cliente')");
			echo $mysqli->error;

			if ($mysqli->num_rows > 0){
				Header('Location: ../cadastro_cli.php');
				exit();
			}else{
				$_SESSION['usuario'] = $email;
				$_SESSION['user'] = "cliente";
				Header("Location:../index.php");
				exit();
			}			

		}

	}

?>