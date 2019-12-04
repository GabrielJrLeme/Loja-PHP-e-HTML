<?php 

	session_start();
	include('conect.php');

	$contem = false;

	if(isset($_POST['btn_grava'])){

		$id = $_SESSION['id_alt'];

		// TRATANDO VARIAVEIS
		$nome_alt = htmlentities($_POST['nome_alt']);
		$valor_alt = htmlentities($_POST['valor_alt']);
		$estoque_alt = htmlentities($_POST['estoque_alt']);
		$descricao_alt = htmlentities($_POST['descricao_alt']);


		if(isset($_FILES['file_alt'])){
			
			// PEGANDO O TIPO DA IMAGEM
			$type = pathinfo($_FILES['file_alt']['name'], PATHINFO_EXTENSION);

			// ARRAY COM EXTENÇÕES PERMITIDAS
			$extencao = array('png','jpg','jpeg');

			// CHECANDO PROMOCAO
			if(isset($_POST['promocao'])){
				// ESTA EM PROMOCAO
				$promocao = "promoção";

				// CAMINHO DO ARQUIVO
				$uploadfile = "images/promocao/".$_FILES['file_alt']['name'];
			}else{
				$promocao = "null";

				// CAMINHO DO ARQUIVO
				$uploadfile = "images/vitrine/".$_FILES['file_alt']['name'];
			}	

			// VERIFICA SE NAO TEM NENHUMA EXTENÇÃO INAPROPRIADA E MOVE PARA A PASTA
			for($i = 0;$i < 3; $i++){

				if($type == $extencao[$i] ){
					$contem = true;
				}
			}								
		}

		if($contem === true){


			$mysqli->query("update produtos set nome_prod = '$nome_alt', valor_prod = '$valor_alt', estoque_quant = '$estoque_alt', descricao = '$descricao_alt', imagem = '$uploadfile', date_last_update = NOW(), promocao = '$promocao' where id = '$id'");
			echo $mysqli->error;	


			if($mysqli){
				move_uploaded_file($_FILES['file_alt']['tmp_name'], "../".$uploadfile);

				Header("location:../estoque.php");
				exit();				
			}else{
				Header("Location:altera_prod.php?alterar=$id");
				exit();
			}


		}else{
			Header("Location:altera_prod.php?alterar=$id");
			exit();
		}

	}else if(isset($_POST['btn_reset'])){
		Header("Location:../estoque.php");
		exit();
	}
		
?>
