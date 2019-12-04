<?php 

	session_start();
	include('rotas/conect.php');

	$idUsuario = htmlentities($_SESSION['id']);

	$cod = "*df7f";

	$query = $mysqli->query("select * from vendas where codigo_carrinho = '$cod'");
	$tabela_cli=$query->fetch_assoc();

	$id_venda = $tabela_cli['id_vendas'];	


	foreach ($_SESSION['carFinal'] as $produto) {
		$idProd = $produto['idProd'];
		$quant = $produto['quant'];
	}


	echo "$idProd<br>";
	echo "$quant<br>";
	echo "$id_venda<br>";
	echo "$cod";



 ?>