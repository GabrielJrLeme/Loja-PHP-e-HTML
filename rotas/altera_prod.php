<!DOCTYPE html>
<?php 
	session_start();
	include('conect.php');

	if(isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
		$id_adm = $_SESSION['id'];
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
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
	<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="../styles/categories.css">
	<link rel="stylesheet" type="text/css" href="../styles/categories_responsive.css">
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
							<div class="logo"><a href="../index.php">Sublime.</a></div>
							<nav class="main_nav">
								<ul>
									<?php 
										if(isset($usuario) && $adm == "admin"){
									?>
											<li><?php echo "Olá $usuario"; ?></li>
											<li><a href="../index.php">Home</a></li>											
											<li><a href="../vitrine.php">Produtos</a></li>						
											<li class="hassubs">
												<a href="#">Funcionario</a>
												<ul>
													<li><a href="../estoque.php">Estoque</a></li>
													<li><a href="../rh.php">Recursos Humanos</a></li>
													<li><a href="#">Administrativo</a></li>
												</ul>
											</li>
											<li><a href="sair.php">Sair</a></li>															
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
			<div class="home_background" style="background-image:url(../images/img1.png)"></div>
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
			<h2>Recursos Humanos</h2>
		</div>
	</div>
	<br>
	<br>
	<br>
	
	<!-- Products -->


<?php 

	if(isset($_GET["alterar"])){

		$id = htmlentities($_GET["alterar"]);

		$query=$mysqli->query("select * from produtos where id = '$id'");
		$tabela=$query->fetch_assoc();

		$nome = $tabela['nome_prod'];
		$valor = $tabela['valor_prod'];
		$estoque = $tabela['estoque_quant'];
		$descricao = $tabela['descricao'];
		$img = $tabela['imagem'];
		$promo = $tabela['promocao'];

		// ENVIA O ID PARA A PROXIMA PAGINA
		$_SESSION['id_alt'] = $id;		
		$_SESSION['img_alt'] = $img;		
	}

 ?>

	<section>

		<form method="POST" action="altera_prod2.php" enctype="multipart/form-data">
			<div class="container">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<p class="nav-link" id="lista_fun">Funcionarios</p>
					</li>
					<li class="nav-item">
						<p class="nav-link">Novo Funcionario</p>
					</li>
					<li class="nav-item">
						<p class="nav-link active">Alterar Funcionario</p>
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
							<th scope="col">valor</th>
							<th scope="col">Estoque</th>
							<th scope="col">Valor</th>												
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="col">
								<input type="file" class="form-control" name="file_alt">
							</th>							
							<th scope="col">
								<input type="text" class="form-control" value="<?php echo $nome ?>" 
								name="nome_alt">
							</th>
							<th scope="col">
								<input type="text" class="form-control" value="<?php echo $valor ?>"
							 name="valor_alt">
							</th>
							<th scope="col">
								<input type="text" class="form-control" value="<?php echo $estoque ?>" 
								name="estoque_alt">
							</th>
							<th scope="col">
								<input type="checkbox" class="form-control"	name="promocao" checked>
							</th>
							<th scope="col">
								<input type="submit" class="form-control btn btn-success" 
								name="btn_grava" value="Gravar">
							</th>							
							<th scope="col">
								<input type="submit" class="form-control btn btn-primary" 
								name="btn_reset" value="Cancelar">
							</th>
						</tr>
						<tr>
							<th>
								<img src="../<?php echo $img ?>" width="200px">
							</th>
							<th scope="col" colspan="10">
								<textarea name="descricao_alt" cols="90" rows="4" class="form-control" 
								value="<?php echo $descricao ?>">
									<?php echo $descricao ?>
								</textarea>
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

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/categories.js"></script>

</body>
</html>

