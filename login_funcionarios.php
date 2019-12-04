<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>..:Funcionarios:..</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/contact.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/login-cadastro.css">
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

	<div class="row">

		<!-- LOGIN CLIENTE -->

		<div class="col-md-12">
			<div class="login-page">
				<div class="form" >
					<form method="POST" action="rotas/valida_login.php">
				    	<div class="row">
							<h3>Área do funcionario</h3>
				    	</div>
				    	<div class="row">
			    			<input type="email" name="email_fun" placeholder="E-mail">
			    			<input type="password" name="senha_fun" placeholder="Senha">
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<button type="submit" name="btn_login_fun">Conectar-me</button>
				    		</div>
				    	</div>
				    </form>
				</div>
			</div>
		</div>

	</div>

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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact.js"></script>
</body>
</html>


					