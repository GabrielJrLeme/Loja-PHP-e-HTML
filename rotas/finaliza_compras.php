<?php

	session_start();
	include('conect.php');


	if(isset($_POST['btn_conluir'])){

		if(isset($_POST['tel']) || isset($_POST['cpf']) || isset($_POST['cep']) || isset($_POST['namber_sob']) || isset($_POST['add'])
			|| isset($_POST['val_carrd']) || isset($_POST['n_card'])){


		// ID DO LIENTE
		$idUsuario = htmlentities($_SESSION['id']);

		// GERANDO O CÓDIGO DO CARRINHO
		$ptn = md5(rand(100,999));
		$carrinho = "*".$ptn;

		$totalCarrinho = htmlentities($_SESSION['payment_data']['total_cart']);
		$pagamento = htmlentities($_SESSION['payment_data']['form_pgt']);
		$envio = htmlentities($_SESSION['payment_data']['form_send']);
		$parcelas = htmlentities($_SESSION['payment_data']['qtd_parc']);
		$totalCompra = htmlentities($_SESSION['payment_data']['total_shopping']);

		$tel = htmlentities($_POST['tel']);
		$cpf = htmlentities($_POST['cpf']);
		$cep = htmlentities($_POST['cep']);
		$cartao = htmlentities($_POST['n_card']);


		// GRAVANDO NO BANCO
		$mysqli->query("insert into vendas () values('null','$idUsuario','$carrinho','$totalCarrinho','$pagamento',
			'$parcelas','$envio','$totalCompra',NOW(),'$tel','$cep','$cpf','$cartao')");
		echo $mysqli->error;



		$query = $mysqli->query("select * from vendas where codigo_carrinho = '$carrinho'");
		$tabela_cli=$query->fetch_assoc();

		$id_venda = $tabela_cli['id_vendas'];

		foreach ($_SESSION['carFinal'] as $produto) {
			$idProd = $produto['idProd'];
			$quant = $produto['quant'];
		}

		$mysqli->query("insert into produtos_vendidos () values('null','$idProd','$id_venda','$quant','$idUsuario','$carrinho')");	
		echo $mysqli->error;
		

		if (($mysqli->num_rows > 0) && ($mysqli->num_rows > 0)){
			Header("location:../comprar.php");
			exit();
		}else{
			header('Location: ../index.php');
			exit();
		}

	}else{
		Header('Location:../dados_pessoais.php');
		exit();
	}

	}else{
		Header('Location:comprar.php');
		exit();
	}
?>