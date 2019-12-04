<!DOCTYPE html>
<?php 
session_start();
include('rotas/conect.php');

if(isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
	$adm = $_SESSION['user'];


	if(isset($_GET['idCliente'])){
		$idCliente = $_GET['idCliente'];

		$query = $mysqli->query("select * from login_cli where id_cli = $idCliente");
		echo $mysqli->error;


	}else{
		Header('Location:vendas.php');
		exit();		
	}

}else{
	Header('Location:index.php');
	exit();
}

?>
<html lang="pt-br">
<head>
	<title>..:Detalhes:..</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/categories.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
</head>
<body>

	<div class="super_container">

		<!-- Header -->
		<header class="header">
			<div class="header_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="header_content d-flex flex-row align-items-center justify-content-start">
								<div class="logo"><a href="index.php">Sublime.</a></div>
								<nav class="main_nav">
									<ul>
										<?php 
										if(isset($usuario) && $adm == "admin"){
											?>
											<li><?php echo "Olá $usuario"; ?></li>
											<li><a href="index.php">Home</a></li>											
											<li><a href="vitrine.php">Produtos</a></li>						
											<li class="hassubs">
												<a href="#">Funcionario</a>
												<ul>
													<li><a href="estoque.php">Estoque</a></li>
													<li><a href="rh.php">Recursos Humanos</a></li>
													<li>Administrativo</li>
													<li><a href="clientes.php">Clientes</a></li>
													<li><a href="vendas.php">Vendas</a></li>
												</ul>
											</li>
											<li><a href="rotas/sair.php">Sair</a></li>											

											<?php
										}
										?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<!-- Search Panel -->
			<div class="search_panel trans_300">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
								<form action="#">
									<input type="text" class="search_input" placeholder="O que você procura?" required="required">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<div class="container">
			<?php 

				while ($dados_cli=$query->fetch_assoc()) {?>

				
					<div class="row">
						<div class="col4">
							Nome:
							<input type="text" value="<?php echo "$dados_cli[nome_cli]" ?>" class="form-control" disabled>
						</div>
						<div class="col8"></div>
					</div>	

					<div class="row">
						<div class="col4">
							Sobrenome:
							<input type="text" value="<?php echo "$dados_cli[sobNome_cli]" ?>" class="form-control" disabled>
						</div>
						<div class="col8"></div>
					</div>	

					<div class="row">
						<div class="col4">
							E-mail:
							<input type="text" value="<?php echo "$dados_cli[email_cli]" ?>" class="form-control" disabled>
						</div>
						<div class="col8"></div>
					</div>											

				<?php }
			 ?>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

<?php 


			$query = $mysqli->query("
				select codigo_carrinho, forma_envio, forma_pagamento, parcelas, total_compra, data from vendas
				where id_cliente = '$idCliente'");
			echo $mysqli->error;			

 ?>		



		<div class="container">
			<h3>Carrinhos</h3>
			<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th scope="col">Carrinho</th>
						<th scope="col">Forma de envio</th>
						<th scope="col">Forma de Pagamento</th>
						<th scope="col">Parcelas</th>			
						<th scope="col">Total das compras</th>														
						<th scope="col">Data</th>							
					</tr>
				</thead>
				<tbody>
					<?php 

					while ($tabela2=$query->fetch_assoc()) {
						echo "
						<tr>
							<td align='center'>$tabela2[codigo_carrinho]</td>
							<td align='center'>$tabela2[forma_envio]</td>
							<td align='center'>$tabela2[forma_pagamento]</td>					
							<td align='center'>$tabela2[parcelas]</td>										
							<td align='center'>$tabela2[total_compra]</td>															
							<td align='center'>$tabela2[data]</td>	
						</tr>
						";
					}

					?>
				</tbody>
				<tfoot>
					<tr>
						
					</tr>
				</tfoot>
			</table>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

<?php  

			$query = $mysqli->query("
				select a.carrinho, b.data, c.nome_prod, a.quantidade, b.valor_carrinho, b.forma_pagamento, b.parcelas from produtos_vendidos a
				join vendas b
				on id_vendas = vendas
				join produtos c
				on id = id_produto
				where cliente = '$idCliente'
				order by b.data
			");
			echo $mysqli->error;

?>
		<!-- VENDAS -->

		<div class="container">
			<h3>Detalhes das compras</h3>
			<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th scope="col">Carrinho</th>
						<th scope="col">Data Compra</th>
						<th scope="col">Produto</th>
						<th scope="col">Quantidade</th>							
						<th scope="col">Total Produtos</th>
						<th scope="col">Forma de Pagamento</th>
						<th scope="col">Parcelas</th>												
					</tr>
				</thead>
				<tbody>
					<?php 

					while ($tabela=$query->fetch_assoc()) {
						echo "
						<tr>
							<td align='center'>$tabela[carrinho]</td>
							<td align='center'>$tabela[data]</td>
							<td align='center' class='text-left'>$tabela[nome_prod]</td>					
							<td align='center'>$tabela[quantidade]</td>										
							<td align='center'>$tabela[valor_carrinho]</td>										
							<td align='center'>$tabela[forma_pagamento]</td>						
							<td align='center'>$tabela[parcelas]</td>						
						</tr>
						";
					}

					?>
				</tbody>
			</table>
		</div>

		<!-- Footer -->
		<div class="footer_overlay"></div>
		<footer class="footer">
			<div class="container">
				<div class="row"></div>
			</div>
		</footer>

	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>
</html>