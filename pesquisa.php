<?php
$showerros = true;
if($showerros) {
	ini_set("display_errors", $showerros);
	error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();
// Inicia a sessão

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SisFor</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="HostSpace template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/blog.css">
	<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
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
							<div class="logo"><a href="index.php">Sis<span>For</span></a></div>
							<nav class="main_nav ml-auto mr-auto">
							</nav>
							<div class="log_reg">
								<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
									<?php if(empty($_SESSION)){ ?>
										<div class="login log_reg_text" data-toggle="modal" data-target="#modal-login"><a href="#">Login</a></div>
										<div class="register log_reg_text" data-toggle="modal" data-target="#modal-registro"><a href="#">Registro</a></div>
									<?php }else { ?>
										<div class="login log_reg_text"><a href="criar.php">Meus Fóruns</a></div>
										<div class="login log_reg_text"><a href="editar.php"><?php echo $_SESSION['nome'] ?></a></div>
										<div class="register log_reg_text getout"><a href="#">Sair</a></div>
									<?php }?>
								</div>
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
				<?php if(empty($_SESSION)){ ?>
					<li data-toggle="modal" data-target="#modal-login"><a>Login</a></li>
					<li data-toggle="modal" data-target="#modal-registro"><a>Registro</a></li>
				<?php }else { ?>
					<li ><a href="criar.php">Meus Fóruns</a></li>
					<li ><a href="editar.php"><?php echo $_SESSION['nome'] ?></a></li>
					<li class ="getout"><a>Sair</a></li>
				<?php }?>
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
							<div class="home_title text-center">Resultado da Pesquisa</div>
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
								<button class="domain_search_button d-flex flex-row align-items-center justify-content-center" id='pesquisar' style="margin-top: -0.3em;"><img src="images/search.png">Pesquisar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require_once "engine/config.php"; 

		$item_por_pag = 10;

		$x = new Foruns();
		$allforuns = 0;
		$x = $x->Read_pesq($_GET['pesq']);
		foreach($x as $xx){
			$allforuns += 1;
		}
		$pagina = intval($_GET['pagina']);
		$num_paginas = ceil($allforuns/$item_por_pag);

		$item = 0;
		for($a = 0; $a<$pagina; $a++){
			$item = $item+$item_por_pag;
		}

		$foruns = new Foruns();
		$foruns = $foruns->ReadAll_paginacao_pesq($_GET['pesq'], $item, $item_por_pag);

		if(empty($foruns)){
			echo "<h4 class='text-center'>Nenhum fórum encontrado!</h4>";
		}else{
		?>

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
					<?php foreach ($foruns as $foruns) { ?>
						<div class="col-lg-4 col-md-6 service_col magic_fade_in">
							<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
								<div class="service_title"><h3><?php echo $foruns['titulo_forum']; ?></h3></div>
								<div class="service_text">
									<p ><?php echo substr($foruns['descricao'], 0, 200); // ab?></p>
								</div>
								<div class="service_button trans_200 ler_mais" id='<?php echo $foruns['id_forum']; ?>'><a style="color: #fff;">Leia mais</a></div>
							</div>
						</div>
					<?php } ?>

					<!-- Page Nav -->
					<div class="col-lg-12 col-md-12 service_col magic_fade_in">
						<div class="page_nav">
							<p>Páginas</p>
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<?php
								$lim_links = 5;
								$inicio = ((($pagina - $lim_links) >= 0) ? $pagina - $lim_links : 0);
								$fim = ((($pagina+$lim_links) < $num_paginas) ? $pagina+$lim_links : $num_paginas-1);

								if($pagina > $lim_links){echo "<li>. . .</li>";}

								if($num_paginas > 0 && $pagina <= $num_paginas){
									for($i = $inicio; $i <= $fim; $i++){

										if($i == $pagina){ ?>
											<li style="background: #5c18af; padding: 0.1em 0.3em; border-radius: 5px; font-family: arial;"><a class="active" style="color: #fff;" href="pesquisa.php?pagina=<?php echo $i; ?>&pesq=<?php echo $_GET['pesq']; ?>"><?php echo $i+1; ?></a></li>
										<?php }else { ?>
											<li style="padding: 0.1em 0.3em; border-radius: 5px; font-family: arial;"><a href="pesquisa.php?pagina=<?php echo $i; ?>&pesq=<?php echo $_GET['pesq']; ?>"><?php echo $i+1; ?></a></li>
											<?php 
										}
									} if($pagina < $num_paginas-$lim_links-1){echo "<li>. . .</li>";}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php } ?>

		<!-- Footer -->
		<footer class="footer magic_fade_in">
			<div class="container">
				<div class="row">

					<div class="col-lg-12 footer_col magic_fade_in">
						<div class="footer_about">
							<div class="footer_logo">Sis<span>for</span></div>
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
						<form class="contact_form">
							<div class="row">
								<div class="col-md-12">
									<input type="number" class="contact_input" id="matricula_login" placeholder="Matricula" required="required">
								</div>
								<div class="col-md-12">
									<input type="password" class="contact_input" id="senha_login" placeholder="Senha" required="required">
								</div>
							</div>
						</form>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" id="logar" class="btn btn-primary1">Entrar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal registro-->
	<div class="modal fade bd-example-modal-lg" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="modal-registro" aria-hidden="true">
		<div class="modal-dialog  modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<div class="contact_container">
						<form class="contact_form">
							<div class="row">
								<div class="col-md-12">
									<input type="text" class="contact_input" id="nome_registro" placeholder="Nome *" required="required">
								</div>

								<div class="col-md-4 col-sd-12">
									<select class="contact_input" id="genero_registro">
										<option selected>Gênero *</option>
										<option value="0">Masculino</option>
										<option value="1">Feminino</option>
										<option value="2">Outro</option>
									</select>
								</div>

								<div class="col-md-4 col-sd-12">
									<input type="text" class="contact_input" id="data_nasc_registro" placeholder="Data de Nascimento *" required="required">
								</div>

								<div class="col-md-4 col-sd-12">
									<input type="text" class="contact_input" id="matricula_registro" placeholder="Matricula *" required="required">
								</div>

								<div class="col-md-12">
									<input type="text" class="contact_input" id="email_registro" placeholder="Email *" required="required">
								</div>

								<div class="col-md-8 col-sd-12">
									<input type="text" class="contact_input" id="curso_registro" placeholder="Curso *" required="required">
								</div>

								<div class="col-md-4 col-sd-12">
									<input type="text" class="contact_input" id="periodo_registro" placeholder="Período *" required="required">
								</div>

								<div class="col-md-12">
									<input type="password" class="contact_input" id="senha_registro" placeholder="Senha *" required="required">
								</div>

							</div>
						</form>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id ="cadastrar" class="btn btn-primary1">Registrar</button>
				</div>
			</div>
		</div>
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
	<script src="js/vanilla-masker.js"></script>
	<script>
		$(document).ready(function(e) {

			VMasker(document.querySelector("#matricula_registro")).maskPattern("99999999999");
			VMasker(document.querySelector("#matricula_login")).maskPattern("99999999999");

			VMasker(document.querySelector("#periodo_registro")).maskPattern("99");
			VMasker(document.querySelector("#data_nasc_registro")).maskPattern("99/99/9999");

			$('.ler_mais').click(function(e) {
				e.preventDefault();
				var id_forum = $(this).attr('id');
				window.location = 'forum.php?id='+id_forum;
			});

			$('#pesquisar').click(function(e) {
				e.preventDefault();
				var pesquisa = $('#pesquisa').val();
				
				if (pesquisa == "") {
					alert('Preencha o campo de pesquisa!');
				}else{
					window.location = "pesquisa.php?pesq="+pesquisa;
				}
			});

			$('#logar').click(function(e) {
				e.preventDefault();

				var matricula_login = $('#matricula_login').val();
				var senha_login = $('#senha_login').val();

				if(matricula_login == "" || senha_login == ""){
					alert('Preencha todos os campos!');
				} else {
					$.ajax({
						url: 'engine/controllers/login.php',
						data : {
							matricula_login : matricula_login,
							senha_login : senha_login
						},
						success: function(data){
							obj = JSON.parse(data);
							if(obj.res === 'true'){
								location.reload();
							} else if(obj.res === 'no_user_found') {
								alert('Usuário não encontrado.');
							} else if(obj.res === 'wrong_password') {
								alert('Senha Incorreta.');
							} else {
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
							}
						},
						async: false,
						type : 'POST'
					});
				}
			});

			$('#cadastrar').click(function(e) {
				e.preventDefault();

				var nome_registro = $('#nome_registro').val();
				var genero_registro = $('#genero_registro').val();
				var data_nasc_registro = $('#data_nasc_registro').val();
				var matricula_registro = $('#matricula_registro').val();
				var email_registro = $('#email_registro').val();
				var curso_registro = $('#curso_registro').val();
				var periodo_registro = $('#periodo_registro').val();
				var senha_registro = $('#senha_registro').val();

				if(nome_registro == "" || genero_registro == "" || data_nasc_registro == "" || matricula_login == "" || email_registro == "" || curso_registro == "" || periodo_registro == "" || senha_registro == ""){
					alert('Preencha todos os campos que possuem *');
				} else if(senha_registro.length < 6){
					alert('Cadastre uma senha com mais de 6 digitos!');
				}else {
					$.ajax({
						url: 'engine/controllers/usuario.php',
						data : {
							nome: nome_registro,
							genero : genero_registro,
							data_nasc: data_nasc_registro,
							matricula : matricula_registro,
							email: email_registro,
							curso : curso_registro,
							periodo: periodo_registro,
							senha : senha_registro,

							action: 'create'
						},
						success: function(data){
							obj = JSON.parse(data);
							if(obj.res === 'true'){
								alert("Cadastro Realizado com Sucesso!");
								$.ajax({
									url: 'engine/controllers/login.php',
									data : {
										matricula_login : matricula_registro,
										senha_login : senha_registro
									},
									success: function(data){
										obj = JSON.parse(data);
										if(obj.res === 'true'){
											location.reload();
										} else {
											alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
										}
									},
									async: false,
									type : 'POST'
								});
							}
						},
						async: false,
						type : 'POST'
					});
				}
			});

			$('.getout').click(function(e) {
				e.preventDefault();
				$.ajax({
					url: 'engine/controllers/logout.php',
					data: {

					},
					error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					},
					success: function(data) {
						console.log(data);
						if(data === 'kickme'){
							document.location.href = 'index.php';
						}

						else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
					},

					type: 'POST'
				});
			});
		});
	</script>
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
	margin-bottom: 0.5em;
}

.btn-primary1{
	background: #00fcc6;
	color: #000;
	border: none;
	font-family: 'Raleway', sans-serif;
}

.btn-primary1:hover{
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

.ler_mais:hover{
	cursor: pointer;
}

.page_nav .d-flex li a{
	color: #222;
}

.page_nav .d-flex li a:hover{
	cursor: pointer;
	color: #1befc5;
}

</style>

