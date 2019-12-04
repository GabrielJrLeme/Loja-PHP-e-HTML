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
	<title>..:Carrinho:..</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
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
								<div class="header_extra ml-auto">
									<div class="search">
										<div class="search_icon">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 475.084 475.084" style="enable-background:new 0 0 475.084 475.084;"
											xml:space="preserve">
											<g>
												<path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
												c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
												C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
												c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
												c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
												c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
												c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
												M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
												c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
												c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z
												"/>
											</g>
										</svg>
									</div>
								</div>
								<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>
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
							<form action="vitrine.php" method="POST">
								<input type="text" class="search_input" name="pesquisa" placeholder="O que você procura?">
								<button type="submit" name="btn">Buscar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/fundo-carrinho3.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- CARRINHO -->

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Produto</div>
						<div class="cart_info_col cart_info_col_price">Valor</div>
						<div class="cart_info_col cart_info_col_quantity">Quantidade</div>
						<div class="cart_info_col cart_info_col_total">Total</div>
					</div>
				</div>
			</div>

			<?php 

			$totalCar = 0;
			$nome = "";
			$vlUni = 0;

		//CRIA CARRINHO
			if(!isset($_SESSION['car'])){
				$_SESSION['car'] = array();
			}	


			if(isset($_GET['idProduto'])){

			//ADICIONAR CARRINHO
				$idProduto = intval($_GET['idProduto']);

				if(!isset($_SESSION['car'][$idProduto])){
					$_SESSION['car'][$idProduto] = 1;
				}

			}


			if(count($_SESSION['car']) == 0){
				echo "<h2>Carrinho vazio</h2>";
			}else{

				$_SESSION['carFinal'] = array();

				foreach ($_SESSION['car'] as $idd => $qtd) {

					$query = $mysqli->query("select * from produtos where id = $idd");
					echo $mysqli->error;

					while ($tabela=$query->fetch_assoc()) {


						?>



						<div class="row cart_items_row">
							<div class="col">

								<!-- Cart Item -->
								<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
									<!-- Name -->
									<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
										<div class="cart_item_image">
											<div>
												<img src="<?php echo "$tabela[imagem]" ?>">
											</div>
										</div>
										<div class="cart_item_name_container">
											<div class="cart_item_name">
												<?php echo "<h4>$tabela[nome_prod]</h4>" ?>		
											</div>
										</div>
									</div>
									<!-- Price -->
									<div class="cart_item_price">
										<?php 	
										echo "R$ $tabela[valor_prod]<br>";
										echo "<a href='rotas/remove.php?id=$idd'>Remover</a>";
										?>
									</div>
									<!-- Quantity -->
									<div class="cart_item_quantity">
										<div class="product_quantity_container">
											<?php 
											echo "<h4>$qtd</h4>
											<a href='rotas/quantidade.php?id=$idd&key=mais'><h5>[Mais]</h5></a>
											<a href='rotas/quantidade.php?id=$idd&key=menos'><h5>[Menos]</h5></a>
											";											
											?>
										</div>
									</div>
									<!-- Total -->
									<div class="cart_item_total">

										<?php 
										// GUARDA OS VALORES NAS VAREAVIES E FAZ O CALCULO
										$nome = $tabela['nome_prod'];
										$vlUni = $tabela['valor_prod'];								
										$total = $vlUni * $qtd;
										echo "R$ ".number_format($total,2,',','.');
										?>

									</div>
								</div>

							</div>
						</div>

						<?php 

						$totalCar += $total;

						$_SESSION['totalCar'] = $totalCar;

						array_push($_SESSION['carFinal'], 
							array(
								'idProd' => $idd,
								'nome' => $nome,
								'quant' => $qtd,
								'vlUni' => $vlUni

							)
						);

					}
				}
			}
			?>

			<form method="POST" action="comprar.php">
				<!-- FORMAS DE PAGAMENTO -->

				<div class="row row_extra">
					<div class="col-lg-4">
						
						<!-- Delivery -->
						<div class="delivery">
							<div class="section_title">Formas de pagamento</div>
							<div class="section_subtitle">Selecione somente uma</div>

							<div class="delivery_options">

								<label class="delivery_option clearfix">cartão Débito
									<input type="radio" checked="checked" name="form_pag" value="1">
									<span class="checkmark"></span>
								</label>

								<label class="delivery_option clearfix">Boleto Bancario
									<input type="radio" checked="checked" name="form_pag" value="2">
									<span class="checkmark"></span>									
								</label>					

								<label class="delivery_option clearfix">Boleto Bancario
									<input type="radio" checked="checked" name="form_pag" value="3">
									<span class="checkmark"></span>									
									<span class="delivery_price"></span>										
								</label>

								<select name="qtd_parcelas" class="form-control">
									<option value="0">-------------------</option>									
									<option value="1">Parcelado em até 1x</option>
									<option value="2">Parcelado em até 2x</option>
									<option value="3">Parcelado em até 3x</option>
									<option value="4">Parcelado em até 4x</option>
									<option value="5">Parcelado em até 5x</option>
								</select>							

								<br>
								<br>
								<div class="section_title">Formas de pagamento</div>
								<br>

								<label class="delivery_option clearfix">Retirada em loja
									<input type="radio" checked="checked" name="formEnvio" value="1">
									<span class="checkmark"></span>
									<span class="delivery_price">Free</span>
								</label>														

								<label class="delivery_option clearfix">Transportadora
									<input type="radio" checked="checked" name="formEnvio" value="2">
									<span class="checkmark"></span>
									<span class="delivery_price">R$ 10.90</span>
								</label>							

								<label class="delivery_option clearfix">Sedex 10
									<input type="radio" checked="checked" name="formEnvio" value="3">
									<span class="checkmark"></span>
									<span class="delivery_price">R$ 20.00</span>
								</label>

							</div>							
						</div>
					</div>

					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Total das compras</div>
							<div class="section_subtitle">Total final</div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Produtos</div>
										<div class="cart_total_value ml-auto">
											<?php 
											echo "R$ ".number_format($totalCar,2,',','.');
											?>	
										</div>
									</li>
								</ul>
							</div>

							<br>
							<br>
							<br>

							<button class="btn btn-outline-secondary" name="btn_confirmar" type="submit">Confirmar</button>

						</div>
					</div>
				</div>
			</form>	
		</div>		
	</div>

	
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
<script src="js/cart.js"></script>
</body>
</html>