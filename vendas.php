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
	<title>..:Administrativo:..</title>
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


		<br>
		<br>
		<br>
		<br>
		<br>

		<div class="container">
			<div class="row">
				<h2>Administrativo</h2>
			</div>
		</div>

		<br>
		<br>
		<br>

		<?php 

			$query = $mysqli->query("
				select a.cliente, a.carrinho, a.quantidade, b.nome_prod, c.nome_cli, d.data from produtos_vendidos a
				join produtos b 
				on id_produto = id
				join login_cli c 
				on cliente = id_cli
				join vendas d 
				on vendas = id_vendas
				order by data
				");
			echo $mysqli->error;



			if(isset($_POST["btn_search"])){

				$nome = htmlentities($_POST["nome"]);

				if(isset($nome)){
					$query = $mysqli->query("
						select a.cliente, a.carrinho, a.quantidade, b.nome_prod, c.nome_cli, d.data from produtos_vendidos a
						join produtos b 
						on id_produto = id
						join login_cli c 
						on cliente = id_cli
						join vendas d 
						on vendas = id_vendas
						where a.carrinho like '%$nome%' or a.quantidade like '%$nome%' or b.nome_prod like '%$nome%' or c.nome_cli like '%$nome%'
						order by data;
						");
					echo $mysqli->error;
				}

			}
		 ?>
		
		<section id="card1">

			<div class="container">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<p class="nav-link active">Vendas</p>
					</li>
				</ul>
			</div>	

			<br>
			<br>

			<form method="POST" action="vendas.php">
				<div class="container">
					<div class="row">
						<div class="col-md-6">

							<h3>
								<?php 

									echo "Venda mensal (11/2019) R$ 600,00";
								 ?>
							</h3>
							
						</div>
						<div class="col-md-4">
							<input type="search" class="form-control" name="nome" placeholder="Busca . . .">
						</div>
						<div class="col-md-2">
							<input type="submit" class="form-control btn btn-primary" name="btn_search" value="Buscar" style="color:white;">
						</div>
					</div>
				</div>
			</form>	

			<br>
			<br>

			<div class="container">
				<table class="table table-hover">
					<thead class="text-center">
						<tr>
							<th scope="col">Carrinho</th>
							<th scope="col">Cliente</th>
							<th scope="col">Quantidade</th>							
							<th scope="col">Produto</th>
							<th scope="col">Detalhes da compra</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						while ($tabela=$query->fetch_assoc()) {
							echo "
							<tr>
								<td align='center'>$tabela[carrinho]</td>
								<td align='center'>$tabela[nome_cli]</td>					
								<td align='center'>$tabela[quantidade]</td>										
								<td align='center' class='text-left'>$tabela[nome_prod]</td>
								<td align='center'><a href='historico.php?idCliente=$tabela[cliente]'>[Detalhes]</a></td>								
							</tr>
							";
						}

						?>
					</tbody>
				</table>
			</div>
		</section>

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