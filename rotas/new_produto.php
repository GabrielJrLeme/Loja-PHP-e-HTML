<?php 
	session_start();
	include('conect.php');

	// LIBERA O INSERT
	$up = false;

	if(isset($_POST['btn_new_fun'])){

		if( empty($_FILES['imagem']) || empty($_POST['nome']) || empty($_POST['valor']) || empty($_POST['qtd']) || empty($_POST['descri'])){

			header("Location:../estoque.php");
			exit();
		}else{

			$nome = htmlentities($_POST['nome']);
			$valor = htmlentities($_POST['valor']);
			$qtd = htmlentities($_POST['qtd']);
			$descri = htmlentities($_POST['descri']);

			// PEGANDO O TIPO DA IMAGEM
			$type = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

			// ARRAY COM EXTENÇÕES PERMITIDAS
			$extencao = array('png','jpg','jpeg');	


			if(isset($_POST['promocao'])){
				// ESTA EM PROMOCAO
				$promocao = "promoção";

				// CAMINHO DO ARQUIVO
				$uploadfile = "images/promocao/".$_FILES['imagem']['name'];
			}else{
				$promocao = "NULL";

				// CAMINHO DO ARQUIVO
				$uploadfile = "images/vitrine/".$_FILES['imagem']['name'];
			}


			// VERIFICA SE NAO TEM NENHUMA EXTENÇÃO INAPROPRIADA E MOVE PARA A PASTA
			for($i = 0;$i < 3; $i++){

				if($type == $extencao[$i] ){
					if(move_uploaded_file($_FILES['imagem']['tmp_name'], "../".$uploadfile)){
						$up = true;
					}
				}
			}

			// INSERT NO BANCO
			if($up === true){

				$ptn = md5(rand(100,999));

				$part_number = "#".$ptn;

				$mysqli->query("insert into produtos values('null','$part_number','$nome','$valor','$qtd',
					'$descri','$uploadfile',NOW(),NOW(),'$promocao')");
				echo $mysqli->error;

				if ($mysqli->num_rows > 0){
					Header("location:../estoque.php");
					exit();
				}else{
					$ptn--;
					header('Location: ../estoque.php');
					exit();
				}
			}
		
		}
	}

 ?>








