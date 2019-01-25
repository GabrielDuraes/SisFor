<?php
$showerros = true;
if($showerros) {
	ini_set("display_errors", $showerros);
	error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();
// Inicia a sessão

if(empty($_SESSION)){
	?>
	<script>
		document.location.href = 'index.php' ;
	</script>
	<?php
}

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
										<div class="login log_reg_text"><a href="editar.php"><?php echo $_SESSION['nome']; ?></a></div>
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
							<div class="home_title text-center">Dados do Usuário</div>
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

		<?php require_once "engine/config.php"; 

		$usuario = new Usuario();
		$usuario = $usuario->Read($_SESSION['id_usuario']);
		?>

		<!-- News -->
		<div class="news" style="margin-top: -7em;">
			<div class="container">
				<div class="row">

					<div class="col-lg-12">
						<br>
						<h3 class="text-center">Editar Dados</h3>
						<br><br>
					</div>

					<div class="col-lg-12">
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_senha">Alterar Senha</button>
						<br><br>
					</div>

					<div class="col-lg-12">
						<form class="contact_form">
							<div class="row">
								<div class="col-md-12">
									<input type="text" class="contact_input" id="nome_registro" placeholder="nome" value="<?php echo $usuario['nome']; ?>" required="required">
								</div>

								<div class="col-md-4 col-sd-12">
									<select class="contact_input" id="genero_registro">
										<option selected>Gênero</option>
										<option value="0" <?php if($usuario['genero'] == 0){echo 'selected';} ?>>Masculino</option>
										<option value="1" <?php if($usuario['genero'] == 1){echo 'selected';} ?>>Feminino</option>
										<option value="2" <?php if($usuario['genero'] == 2){echo 'selected';} ?>>Outro</option>
									</select>
								</div>

								<div class="col-md-4 col-sd-12">
									<input type="text" class="contact_input" id="data_nasc_registro" placeholder="Data de Nascimento" value="<?php echo $usuario['data_nasc']; ?>" required="required">
								</div>

								<div class="col-md-4 col-sd-12">
									<input type="text" class="contact_input" id="matricula_registro" placeholder="Matrícula" value="<?php echo $usuario['matricula']; ?>" required="required">
								</div>

								<div class="col-md-12">
									<input type="text" class="contact_input" id="email_registro" placeholder="Email" value="<?php echo $usuario['email']; ?>" required="required">
								</div>

								<div class="col-md-8 col-sd-12">
									<input type="text" class="contact_input" id="curso_registro" placeholder="Curso" value="<?php echo $usuario['curso']; ?>" required="required">
								</div>

								<div class="col-md-4 col-sd-12">
									<input type="text" class="contact_input" id="periodo_registro" placeholder="Período" value="<?php echo $usuario['periodo']; ?>" required="required">
								</div>

								<div class="col-md-12">
									<p class="text-center"><button type="button" class="btn btn-secondary" id="atualizar">Atualizar</button></p>
								</div>

							</div>
						</form>

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

	<!-- Modal senha-->
	<div class="modal fade" id="modal_senha" tabindex="-1" role="dialog" aria-labelledby="modal_senha" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="contact_container">
						<form class="contact_form">
							<div class="row">
								<div class="col-md-12">
									<input type="password" class="contact_input" id="senha_velha" placeholder="Senha antiga" required="required" maxlength="20">
								</div>

								<div class="col-md-12">
									<input type="password" class="contact_input" id="senha_atual" placeholder="Senha nova" required="required" maxlength="20">
								</div>
							</div>
						</form>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" id="atualizar_senha" class="btn btn-primary1">Atualizar</button>
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

			VMasker(document.querySelector("#data_nasc_registro")).maskPattern("99/99/9999");

			$('#atualizar_senha').click(function(e) {
				e.preventDefault();

				var id_usuario = "<?php echo $_SESSION['id_usuario']; ?>";
				var senha_velha = $('#senha_velha').val();
				var senha_atual = $('#senha_atual').val();

				if(senha_velha == "" || senha_atual == ""){
					alert('Preencha todos os campos!');
				} else if(senha_atual.length < 6){
					alert('Cadastre uma senha com mais de 6 digitos!');
				}else{
					$.ajax({
						url: 'engine/controllers/usuario.php',
						data: {
							id_usuario : id_usuario,
							senha : senha_velha,

							action: 'cripto'
						},
						success: function(data) {
							if (data === 'true') {
								$.ajax({
									url: 'engine/controllers/usuario.php',
									data: {
										id_usuario: id_usuario,
										senha : senha_atual,

										action: 'updateSenha'
									},
									success: function(data) {
										if (data === 'true') {
											alert('Senha atualizada com sucesso!');
											location.reload();
										}
									},
									async: false,
									type: 'POST'
								});
							} else {
								alert('Senha antiga incorreta. Tente novamente');
							}
						},
						async: false,
						type: 'POST'
					});
				}

			});

			$('#atualizar').click(function(e) {
				e.preventDefault();

				var id_usuario = "<?php echo $_SESSION['id_usuario']; ?>";
				var nome_registro = $('#nome_registro').val();
				var genero_registro = $('#genero_registro').val();
				var data_nasc_registro = $('#data_nasc_registro').val();
				var matricula_registro = $('#matricula_registro').val();
				var email_registro = $('#email_registro').val();
				var curso_registro = $('#curso_registro').val();
				var periodo_registro = $('#periodo_registro').val();

				if(nome_registro == "" || genero_registro == "" || data_nasc_registro == "" || matricula_registro == "" || email_registro == "" || curso_registro == "" || periodo_registro == ""){
					alert('Preencha todos os campos!');
				} else {
					$.ajax({
						url: 'engine/controllers/usuario.php',
						data : {
							id_usuario : id_usuario,
							nome: nome_registro,
							genero : genero_registro,
							data_nasc: data_nasc_registro,
							matricula : matricula_registro,
							email: email_registro,
							curso : curso_registro,
							periodo: periodo_registro,

							action: 'update'
						},
						success: function(data){
							if(data === 'true'){
								alert("Dados atualizados com Sucesso!");
								location.reload();
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

.delete:hover{
	background: rgba(221, 15, 39, 0.5);
	cursor: pointer;
}

</style>