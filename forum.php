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
								<div class="home_title text-center">Fórum</div>
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

		$foruns = new Foruns();
		$foruns = $foruns->Read($_GET['id']);

		$usuario = new usuario();
		$usuario = $usuario->Read($foruns['fk_usuario']);

		$comentario = new Comentarios();
		$comentario = $comentario->Read_FK($_GET['id']);

		$n_coments = 0;
		foreach ($comentario as $com) { 
			$n_coments += 1;
		}

		$item_por_pag = 20;

		$x = new Comentarios();
		$comensts_foruns = 0;
		$x = $x->Read_FK($_GET['id']);
		foreach($x as $xx){
			$comensts_foruns += 1;
		}
		$pagina = intval($_GET['pagina']);
		$num_paginas = ceil($comensts_foruns/$item_por_pag);

		$item = 0;
		for($a = 0; $a<$pagina; $a++){
			$item = $item+$item_por_pag;
		}

		$comentario = new Comentarios();
		$comentario = $comentario->Read_Fk_paginacao($_GET['id'], $item, $item_por_pag);

		?>

		<!-- News -->
		<div class="news" style="margin-top: -7em;">
			<div class="container">
				<div class="row">
					<!-- News Content -->
					<div class="col-lg-12">
						<div class="news_posts">
							<!-- News Post -->
							<div class="news_post magic_fade_in">
								<div class="news_post_content">
									<div class="news_post_title"><a href="#"><?php echo $foruns['titulo_forum']; ?></a></div>
									<div class="news_post_meta">
										<ul class="d-flex flex-row align-items-start justify-content-start">
											<li>Por <a style="color: #5c18af;"><?php echo $usuario['nome']; ?></a></li>
											<li>Data <a style="color: #5c18af;"><?php echo $foruns['created_at']; ?></a></li>
											<li><a style="color: #5c18af;"><?php echo $n_coments; ?> Comentário(s)</a></li>
										</ul>
									</div>
									<div class="news_post_text">
										<p style="text-align: justify;"><?php echo $foruns['descricao']; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-12">
						<div class="form-group">
							<label for="comment">Comentário:</label>
							<textarea class="form-control" rows="3" style="resize: none; color: #222;" id="comentario" <?php if(empty($_SESSION)){echo 'disabled';} ?>><?php if(empty($_SESSION)){echo 'Faça login para comentar!';} ?></textarea>
							<button type="button" class="btn btn-secondary" id="comentar" style="margin-top: 0.3em;" <?php if(empty($_SESSION)){echo 'disabled';} ?>>Comentar</button>
						</div>
					</div>

					<div class="col-lg-12">
						<h4>Comentários: </h4>
						<hr>
					</div>
					
					<?php foreach ($comentario as $comentario) { ?>
					<div class="col-lg-12">
						<div>
							<h5>
								<?php 
									$usuario = new usuario();
									$usuario = $usuario->Read($comentario['fk_usuario']);
									echo $usuario['nome'];
								 ?>:
							</h5>
							<p style="margin-top: -0.5em;"><?php echo $comentario['comentario']; ?></p>
							
							<?php if($comentario['fk_usuario'] == $_SESSION['id_usuario']){ ?>
								<span style="display: block; color: red; font-size: 12px" id="<?php echo $comentario['id_comentario']; ?>" class="delete_coment">Apagar Comentário</span>
							<?php } ?>
						</div>
						<br>
					</div>
					<?php } ?>

					<!-- Page Nav -->
					<div class="col-lg-12 col-md-12 service_col magic_fade_in">
						<div class="page_nav">
							<br>
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
											<li style="background: #5c18af; padding: 0.1em 0.3em; border-radius: 5px; font-family: arial;"><a class="active" style="color: #fff;" href="forum.php?pagina=<?php echo $i; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $i+1; ?></a></li>
										<?php }else { ?>
											<li style="padding: 0.1em 0.3em; border-radius: 5px; font-family: arial;"><a href="forum.php?pagina=<?php echo $i; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $i+1; ?></a></li>
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

			$('#comentar').click(function(e) {
				e.preventDefault();

				var comentario = $('#comentario').val();
				var fk_usuario = "<?php echo $_SESSION['id_usuario']; ?>";
				var fk_forum = "<?php echo $_GET['id']; ?>";

				if(comentario == ""){
					alert('Preencha o campo de comentário!');
				}else{
					$.ajax({
						url: 'engine/controllers/comentarios.php',
						data : {
							fk_forum : fk_forum,
							fk_usuario : fk_usuario,
							comentario : comentario,

							action: 'create'
						},
						success: function(data){
							if(data === 'true'){
								alert('Comentário realizado!');
								location.reload();
							}
						},
						async: false,
						type : 'POST'
					});
				}
			});

			$('.delete_coment').click(function(e) {
				e.preventDefault();

				var id_comentario = $(this).attr('id');

				var r = confirm("Deseja Deletar este comentário?");
				if (r == true) {
					$.ajax({
						url: 'engine/controllers/comentarios.php',
						data : {
							id_comentario: id_comentario,

							action: 'delete'
						},
						success: function(data){
							if(data === 'true'){
								alert("Comentário Deletado!");
								location.reload();
							}else{
								alert('Error!');
							}
						},
						async: false,
						type : 'POST'
					});
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

				if(nome_registro == "" || genero_registro == "" || data_nasc_registro == "" || matricula_registro == "" || email_registro == "" || curso_registro == "" || periodo_registro == "" || senha_registro == ""){
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
							document.location.href = 'forum.php?id=<?php echo $_GET['id'] ?>';
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

.page_nav .d-flex li a:hover{
	cursor: pointer;
	color: #1befc5;
}

.delete_coment:hover{
	cursor: pointer;
}
</style>