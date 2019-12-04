<!DOCTYPE html>
<?php 
	session_start();
	include('rotas/conect.php');

	if(isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
		$id = $_SESSION['id'];
		$adm = $_SESSION['user'];

		$query = $mysqli->query("select * from produtos");
		echo $mysqli->error;

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
	<style type="text/css">
		thead{
			background-color:#d9d8d7;
			color:#000000;
			font-family: times new roma;
			font-weight: bold;
			font-size: 15pt;
		}
		tbody{
			font-family: arial;
		}
		tr{
			color:#000000;
		}
		th{
			color:#000000;
		}
		#btn_busca{
			color: white;
		}

	</style>		

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

<?php 
	if(isset($_POST["btn_search"])){

		$nome = htmlentities($_POST["nome"]);

		if(isset($nome)){
			$query = $mysqli->query("select * from produtos where part_number like '%$nome%' or nome_prod like '%$nome%' or valor_prod like '%$nome%' or descricao like '%$nome%' or promocao like '%$nome%'");
			echo $mysqli->error;
		}
	}
?>

	<br>
	<br>

	<div class="container">
		<div class="row">
			<h2>Estoque</h2>
		</div>
	</div>
	<br>
	<br>
	<br>
	
	<!-- Products -->

	<section id="card1">

		<div class="container">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<p class="nav-link active">Produtos</p>
				</li>
				<li class="nav-item">
					<p class="nav-link" id="novo_fun">Novo Produto</p>
				</li>
			</ul>
		</div>	
		<br>
		<br>
		<form method="POST" action="estoque.php">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-4">
						<input type="search" class="form-control" name="nome" placeholder="Digite o que procura...">
					</div>
					<div class="col-md-2">
						<input type="submit" class="form-control btn btn-primary" id="btn_busca" name="btn_search" value="Buscar">
					</div>
				</div>
			</div>
		</form>		

		<div class="container">
			<table class="table table-hover text-center">
				<?php 

					while ($tabela=$query->fetch_assoc()) {
						echo "
				<thead>						
						<tr>						
							<th scope='col'>Part Number</th>
							<th scope='col'>Nome</th>
							<th scope='col'>Valor</th>
							<th scope='col'>Qtd estoque</th>												
							<th scope='col'>Primeira homologação</th>
							<th scope='col'>Ultima homologação</th>						
							<th scope='col'>Estado do produto</th>
							<th scope='col'>Opções</th>
						</tr>
				</thead>
				<tbody>												
						<tr>
							<td align='center'>$tabela[part_number]</td>
							<td align='center'>$tabela[nome_prod]</td>
							<td align='center'>$tabela[valor_prod]</td>							
							<td align='center'>$tabela[estoque_quant]</td>							
							<td align='center'>$tabela[date_create]</td>
							<td align='center'>$tabela[date_last_update]</td>
							<td align='center'>$tabela[promocao]</td>
							<br>
							<td colspan='2'>
								<a href='rotas/excluir_prod.php?excluir=$tabela[id]'>[excluir]</a>
								<a href='rotas/altera_prod.php?alterar=$tabela[id]'>[alterar]</a>
							</td>
						</tr>
						<tr>
							<td align='center'>
								<img src='$tabela[imagem]' width='150px' heigth='150px'>
							</td>						
							<td align='center' colspan='10' style='text-align:left;'>
								$tabela[descricao]
							</td>
						</tr>
						<br>
				</body>						
					";
				}

				 ?>
			</table>
		</div>
	</section>

	<section style="display: none;" id="card2">

		<form method="POST" action="rotas/new_produto.php" enctype="multipart/form-data">
			<div class="container">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<p class="nav-link" id="lista_fun">Produtos</p>
					</li>
					<li class="nav-item">
						<p class="nav-link active">Novo Produto</p>
					</li>
				</ul>
			</div>	

			<br>
			<br>

			<div class="container">
				<table class="table table-hover">
					<thead>
						<tr>						
						<th scope="col">Imagem</th>
						<th scope="col">Nome</th>
						<th scope="col">Valor</th>
						<th scope="col">Qtd estoque</th>							
						<th scope="col">Descrição</th>														
						<th scope="col">Promoção</th>	
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="col">
								<input type="file" class="form-control" name="imagem">
							</th>
							<th scope="col">
								<input type="text" class="form-control" placeholder="Nome..." name="nome">
							</th>			
							<th scope="col">
								<input type="text" class="form-control" placeholder="Valor..." name="valor">
							</th>
							<th scope="col">
								<input type="text" class="form-control" placeholder="Qtd estoque..."
								 name="qtd">
							</th>
							<th scope="col">
								<input type="text" class="form-control" placeholder="Descrição..." 
								name="descri">
							</th>		
							<th scope="col">
								<input type="radio" class="form-control" 
								name="promocao">
							</th>								
							<th scope="col">
								<input type="submit" class="form-control btn btn-primary" 
								name="btn_new_fun" value="Registrar">
							</th>
						</tr>						
					</tbody>
				</table>
			</div>
		</form>	
	</section>

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

<script type="text/javascript">
	$(document).ready(function(){


		$("#novo_fun").click(function(){
			$("#card1").hide();
			$("#card2").show();
		});
		$("#lista_fun").click(function(){			
			$("#card2").hide();
			$("#card1").show();
		});

	});
	
</script>

</body>
</html>
