<?php 
	
	session_start();
	include('conect.php');


	if(isset($_POST['btn_atualiza_dados'])){

		if(isset($_POST['nome']) || isset($_POST['sobNome']) || isset($_POST['senha']) || isset($_POST['email']) || 
			isset($_POST['telefone']) || isset($_POST['cep']) || isset($_POST['estado'])  || isset($_POST['cidade']) || 
			isset($_POST['bairro']) || isset($_POST['rua']) || isset($_POST['numero']) || isset($_POST['add']) || 
			isset($_POST['n_card']) || isset($_POST['val_card']) || isset($_POST['nome_card'])  || isset($_POST['cpf'])) {


			// PEGANDO OS DADOS
			$id = htmlentities($_SESSION['id']);
			$nome = htmlentities($_POST['nome']);
			$sobNome = htmlentities($_POST['sobNome']);
			$senha = htmlentities($_POST['senha']);
			$email = htmlentities($_POST['email']);
			$telefone = htmlentities($_POST['telefone']);
			$cep = htmlentities($_POST['cep']);
			$estado = htmlentities($_POST['estado']);
			$cidade = htmlentities($_POST['cidade']);
			$bairro = htmlentities($_POST['bairro']);
			$rua = htmlentities($_POST['rua']);
			$numero = htmlentities($_POST['numero']);
			$add = htmlentities($_POST['add']);
			$n_card = htmlentities($_POST['n_card']);
			$val_card = htmlentities($_POST['val_card']);
			$nome_card = htmlentities($_POST['nome_card']);
			$cpf = htmlentities($_POST['cpf']);


			// CHECA DNA TABELA ENDEREÇO SE TEM REFERENCIA, SE FOI ADICIONADO ALGUM CADASTRO
			$query = $mysqli->query("select * from dados_cli where id_cli = '$id'");
			echo $mysqli->error;

			if ($query->num_rows == 1){

				$query = $mysqli->query("update login_cli set nome_cli = '$nome', sobNome_cli = '$sobNome',
					email_cli = '$email',senha_cli = '$senha' where id_cli = '$id' ");

				$query = $mysqli->query("update dados_cli set cep = '$cep',estado = '$estado',
					ciade = '$cidade',bairro = '$bairro',rua_avenida = '$rua',numero = '$numero',
					adicionais = '$add',telefone = '$telefone',n_cartao = '$n_card',
					validade_cartao = '$val_card',nome_cartao = '$nome_card',cpf = '$cpf' 
					where id_cli = '$id' ");

				if ($mysqli->num_rows == 1){
					Header("Location:../dados_pessoais.php");
					exit();
				}else{
					
					Header("Location:../dados_pessoais.php");
					$_SESSION['erro_dados'] = "Atualização não foi concluida.";
					exit();
				}
			
			}else{

				$query = $mysqli->query("update login_cli set nome_cli = '$nome', sobNome_cli = '$sobNome',
					email_cli = '$email',senha_cli = '$senha' where id_cli = '$id' ");				
				
				// SE NAO TIVER REGISTRO, GRAVA NA TABELA
				$query = $mysqli->query("insert into dados_cli values('','$id','$cep','$estado','$cidade','$bairro','$rua',
					'$numero','$add','$telefone','$n_card','$val_card','$nome_card','$cpf')");
				echo $query->error;

				if ($mysqli->num_rows == 1){
					Header("Location:../dados_pessoais.php");
					exit();
				}else{
					// SE O INSERT NÃO DER CERTO, VOLTA PARA A PAGINA DE CASTRO
					Header("Location:../dados_pessoais.php");
					$_SESSION['erro_dados'] = "Atualização não foi concluida.";
					exit();
				}
			}

		}

	}else{
		Header('Location:../dados_pessoais.php');
		exit();
	}

 ?>