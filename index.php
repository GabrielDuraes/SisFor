<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fórum</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="HostSpace template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/services.css">
	<link rel="stylesheet" type="text/css" href="styles/services_responsive.css">
</head>
<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header trans_400">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
							<div class="logo"><a href="#">Fó<span>rum</span></a></div>
						<!--<nav class="main_nav ml-auto mr-auto">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">About us</a></li>
								<li class="active"><a href="services.html">Services</a></li>
								<li><a href="blog.html">News</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>-->
						<div class="log_reg">
							<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
								<div class="login log_reg_text" data-toggle="modal" data-target="#modal-login"><a href="#">Login</a></div>
								<div class="register log_reg_text" data-toggle="modal" data-target="#modal-registro"><a href="#">Register</a></div>
							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->
	
	<div class="menu_overlay trans_400"></div>
	<div class="menu trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<nav class="menu_nav">
			<ul>
				<li data-toggle="modal" data-target="#modal-login"><a>Login</a></li>
				<li data-toggle="modal" data-target="#modal-registro"><a>Registro</a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->
	<div class="home">
		<div class="home_background"></div>
		<div class="background_image background_city" style="background-image:url(images/city_3.png)"></div>
		<div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_3"><img src="images/cloud_full_2.png" alt=""></div>
		<div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title text-center">Pesquise Sua Dúvida</div>
							<div class="breadcrumbs">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<!--<li><a href="index.html">Home</a></li>
										<li>Services</li>-->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Domain Search -->
		<div class="domain_search">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="domain_search_form_container d-flex flex-column align-items-center justify-content-center">
							<form action="#" id="domain_search_form" class="domain_search_form d-flex flex-md-row flex-column align-items-center justify-content-start">
								<div class="d-flex flex-row align-items-center justify-content-start">
									<input type="text" class="contact_input" id="pesquisa" placeholder="Qual a dúvida?" required="required">
									<!--<input type="text" class="domain_search_input" required="required">
									<div class="domain_search_dropdown d-flex flex-row align-items-center justify-content-start">
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<div class="domain_search_selected">.io</div>
										<ul>
											<li>.io</li>
											<li>.com</li>
											<li>.net</li>
										</ul>
									</div>-->
								</div>
								<button class="domain_search_button d-flex flex-row align-items-center justify-content-center"><img src="images/search.png" alt="">Pesquisar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Services -->

		<div class="services">
			<div class="container">
				<div class="row" style="margin-bottom: -5em; margin-top: -4em;">
					<div class="col">
						<div class="section_title text-center magic_fade_in"><h2>Fóruns</h2></div>
					</div>
				</div>
				<div class="row services_row">
					<!-- Service -->
					<div class="col-lg-4 col-md-6 service_col magic_fade_in">
						<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
							<div class="service_title"><h3>Cloud Backup</h3></div>
							<div class="service_text">
								<p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium turpis ege.</p>
							</div>
							<div class="service_button trans_200"><a href="#">Leia mais</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer class="footer magic_fade_in">
			<div class="container">
				<div class="row">

					<div class="col-lg-12 footer_col magic_fade_in">
						<div class="footer_about">
							<div class="footer_logo">Fó<span>rum</span></div>
							<div class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </div>
							<div class="footer_text">
								<p>Criado e Desenvolvido por Gabriel Durães, Pedro Orlando e Marcus Felipe.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap-4.1.2/popper.js"></script>
	<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/services.js"></script>
</body>
</html>

<style type="text/css">
.modal-header{
	background: #8e00c5;
}

.modal-header h5{
	color: #fff;
	font-family: 'Raleway', sans-serif;
	font-size: 1.5em;
}

.contact_input{
	color: black;
	background: #fff;
	border: 2px solid #8e00c5;
	font-size: 1.2em;
}

.btn-primary{
	background: #00fcc6;
	color: #000;
	border: none;
	font-family: 'Raleway', sans-serif;
}

.btn-primary:hover{
	background: #06d6a9;
	color: #000;
}

#pesquisa{
	padding: 1.7em 0.1em;
	font-size: 1.2em !important;
	font-weight: 700 !important;
}

#pesquisa::-webkit-input-placeholder{
	font-size: 1.2em !important;
	font-weight: 700 !important;
	margin-left: 0.1em;
}

</style>

<!-- Modal login-->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="contact_container">
					<form action="#" id="contact_form" class="contact_form">
						<div class="row">
							<div class="col-md-12">
								<input type="text" class="contact_input" id="matricula_login" placeholder="Matricula" required="required">
								<br><br>
							</div>
							<div class="col-md-12">
								<input type="password" class="contact_input" id="senha_login" placeholder="Senha" required="required">
								<br><br>
							</div>
						</div>
					</form>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Entrar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal registro-->
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="modal-registro" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>