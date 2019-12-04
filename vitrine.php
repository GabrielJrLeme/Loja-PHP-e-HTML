<!DOCTYPE html>
<?php 
	session_start();
	include('rotas/conect.php');

	if(isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
		$id = $_SESSION['id'];
		$adm = $_SESSION['user'];
	}

 ?>
<html lang="pt-br">
<head>
<title>..:Produtos:..</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
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
										if(isset($usuario)){

											if($adm == "cliente"){
									?>
										<li><?php echo "Olá $usuario"; ?></li>
										<li><a href="vitrine.php">Produtos</a></li>
										<li><a href="dados_pessoais.php">Meus dados</a></li>		
										<li><a href="carrinho.php">Carrinho</a></li>		
										<li><a href="rotas/sair.php">Sair</a></li>
															
									<?php
											}else if($adm == "admin"){
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

										}else{
									?>
										<li><a href="vitrine.php">Produtos</a></li>
										<li><a href="cadastro_cli.php">Cadastrar-me</a></li>
										<li><a href="login_cli.php">Login</a></li>
										<li><a href="login_funcionarios.php">Funcionario</a></li>
									<?php		
										}
									?>
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
			<div class="home_background" style="background-image:url(images/img1.png)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Diversão <br>& Aventura </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- FILTRO -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="sorting_container ml-md-auto">
							<div class="sorting">

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">


					<div class="product_grid">

						<?php 

							$query = $mysqli->query("select * from produtos");
							echo $mysqli->error;


							if(isset($_POST['btn'])){
								$nome = htmlentities($_POST["pesquisa"]);

								if(isset($nome)){
									$query = $mysqli->query("select * from produtos where part_number like '%$nome%' or nome_prod like '%$nome%' or valor_prod like '%$nome%' or descricao like '%$nome%' or promocao like '%$nome%'");
									echo $mysqli->error;
								}
							}

							while ($tabela=$query->fetch_assoc()) {
								echo "

									<!-- Product -->
									<div class='product'>
										<div class='card' style='width:240px;height:360px; position:relative;'>
											<img class='card-img-top' src='$tabela[imagem]' width='220' height='190'>
											<div class='card-body'>
												<h5 class='card-title' style='color:#000000; font-size:15pt;'>R$ $tabela[valor_prod]</h5>
												<p class='card-text'style='color:#000000; font-size:10pt; text-align:left;'>$tabela[nome_prod]</p>
												<a href='detalhes.php?identi=$tabela[id]' class='btn btn-primary' style='position:absolute;bottom:8px; left:10px;'>Detalhes</a>
											</div>
										</div>
									</div>

								";
							}

						 ?>
									
					</div>


				</div>
			</div>
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
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/categories.js"></script>
</body>
</html>