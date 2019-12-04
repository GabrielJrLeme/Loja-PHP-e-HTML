<!DOCTYPE html>
<?php 
session_start();
include('rotas/conect.php');

if(isset($_SESSION['usuario'])){

	$usuario = $_SESSION['usuario'];
	$idUsuario = $_SESSION['id'];


}else{

	Header("Location:login_cli.php");
	exit();
}

?>
<html lang="pt-br">
<head>
	<title>..:Confirmar dados para entrega:..</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/checkout.css">
	<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
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
										<li><?php echo "Olá $usuario"; ?></li>
										<li><a href="vitrine.php">Produtos</a></li>
										<li><a href="dados_pessoais.php">Meus dados</a></li>		
										<li><a href="carrinho.php">Carrinho</a></li>		
										<li><a href="rotas/sair.php">Sair</a></li>
									</ul>
								</nav>

							</div>
						</div>
					</div>
				</div>
			</div>	

		</header>

		<!-- Checkout -->
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<form method="POST" action="rotas/finaliza_compras.php">
			<!-- PRODUTOS -->

			<div class="container">
				<div class="row">
					<div class="section_title">Podutos</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<?php 
					foreach ($_SESSION['carFinal'] as $produto) {						
						?>
						<div class="col-md-3">
							<div class="billing checkout_section">
								<div class="checkout_form_container">
									Nome <br>
									<input type="text" class="form-control" value="<?php echo"$produto[nome]" ?>" disabled>
									<br>
									Quantidade <br>
									<input type="text" class="form-control" value="<?php echo"$produto[quant]" ?>" disabled>
									<br>
									Valor Unitario<br>
									<input type="text" class="form-control" value="<?php echo"$produto[vlUni]" ?>" disabled>
								</div>
							</div>
						</div>
						<?php 
					}
					?>
				</div>

				<br>
				<br>
				<br>
				
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4" align="center">
						<?php 

						// PREÇO TOTAL DO CARRINHO SEM FORMA DE PAGAMENTO
						$total_carrinho = $_SESSION['totalCar'];
						$total_compra = $total_carrinho;

						echo "<h3>Total a pagar do carrinho.</h3>";
						echo "<br><h4>R$ ".number_format($total_carrinho,2,',','.')."</h4>";
						?>
					</div>
					<div class="col-md-4"></div>				
				</div>				
			</div>

			<br>
			<br>

			<div class="container">
				<hr>
			</div>	

			<?php 
			if(isset($_POST['btn_confirmar'])){

				if(empty($_POST['formEnvio']) && empty($_POST['form_pag'])){
					Header('Location:carrinho.php');
					exit();
				}else{

					$forma_Envio = $_POST['formEnvio'];
					$forma_pgt = $_POST['form_pag'];
					$qtd_parcelas = 1;

						// FORM DE PAGAMENTO
					if($forma_Envio == 1){

						$formEnvio = "Retirada em loja"; 

					}else if($forma_Envio == 2){

						$formEnvio = "Transportadora";
						$total_compra = $total_carrinho + 10.90;

					}else if($forma_Envio == 3){

						$formEnvio = "Sedex 10";
						$total_compra = $total_carrinho + 20.00;

					}


						// FORMA DE PAGAMENTO
					if($forma_pgt == 1){

						$forma_pgt = "Débito";

					}else if($forma_pgt == 2){

						$forma_pgt = "Boleto bancario.";

					}else if($forma_pgt == 3){

						if(isset($_POST['qtd_parcelas']) && ($_POST['qtd_parcelas'] != 0)){

							$qtd_parcelas = $_POST['qtd_parcelas'];
							$forma_pgt = "Parcelado.";

						}else{
							Header('Location:carrinho.php');
							exit();
						}


					}

				}

			}
			?>

			<div class="container">
				<div class="row text-center">
					<div class="col-md-4">
						<?php  
						echo "<h4>Foram de pagamento</h4>";
						echo "<br>$forma_pgt<br><br>";
						for ($i=1;$i <= $qtd_parcelas; $i++) { 
							echo "R$ ".number_format($total_compra/$qtd_parcelas,2,',','.')."<br>";
						}


						?>
					</div>
					<div class="col-md-4">
						<?php 
						echo "<h4>Foram de envio</h4>";
						echo "<br>$formEnvio";
						?>
					</div>
					<div class="col-md-4">
						<?php 
						echo "<h4>Total da compra</h4>";
						echo "<br>R$ ".number_format($total_compra,2,',','.');
						?>
					</div>				
				</div>
			</div>

			<?php 
			$_SESSION['payment_data'] = array(
				"total_cart" => $total_carrinho,
				"form_pgt" => $forma_pgt,
				"form_send" => $formEnvio,
				"qtd_parc" => $qtd_parcelas,
				"total_shopping" => $total_compra,
			);
			?>				

			<br>
			<br>
			<br>		

			<!-- DADOS COMPRADOR -->	
			<div class="container">
				<div class="row">
					<div class="section_title">Dados para envio e pagamento.</div>
				</div>
			</div>

			<div class="checkout">
				<div class="container">
					<div class="row">
						<div class="row">
							<?php 

							$query = $mysqli->query("select * from dados_cli where id_cli = $idUsuario ");

							while ($dados_cli=$query->fetch_assoc()) {

								?>
								<div class="col-md-4">
									<h4>Telefône:</h4>
									<input type="text" name="tel" class="form-control" 
									value="<?php echo"$dados_cli[telefone]" ?>" >
									<br>
									<h4>CPF:</h4>
									<input type="text" name="cpf" class="form-control" 
									value="<?php echo"$dados_cli[cpf]" ?>" >	

								</div>
								<div class="col-md-4">

									<h4>CEP:</h4>
									<input type="text" name="cep" class="form-control" 
									value="<?php echo"$dados_cli[cep]" ?>">	
									<br>	
									<h4>Nome e Sobrenome:</h4>
									<input type="text" name="namber_sob" class="form-control" 
									value="<?php echo"$dados_cli[nome_cartao]" ?>" >																		
								</div>
								<div class="col-md-4">

									<h4>Adicionais:</h4>
									<input type="text" name="add" class="form-control" 
									value="<?php echo"$dados_cli[adicionais]" ?>" >	
									<br>										
									<h4>Validade:</h4>
									<input type="text" name="val_carrd" class="form-control" 
									value="<?php echo"$dados_cli[validade_cartao]" ?>" >

								</div>		
								<div class="col-md-12">
									<br>
									<h4>Nº Cartão:</h4>
									<input type="text" name="n_card" class="form-control" 
									value="<?php echo"$dados_cli[n_cartao]" ?>" >		

								</div>
								<?php 
							}
							?>	
						</div>
					</div>
					<br>
					<br>
					<br>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3">
							
							<a href="carrinho.php" class="form-control btn btn-outline-secondary" style="color: black;">
								<- Voltar
							</a>	

						</div>
						<div class="col-md-3">
							<button type="submit" name="btn_conluir" class="form-control btn btn-outline-secondary">Concluir
							</button>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</form>

		<!-- Footer -->
		<div class="footer_overlay"></div>
		<footer class="footer">
			<div class="container">
				<div class="row">

				</div>
			</div>
		</footer>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/checkout.js"></script>
</body>
</html>