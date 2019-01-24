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
							<div class="home_title text-center">Meus Fóruns</div>
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

		$item_por_pag = 10;

		$x = new Foruns();
		$meusforuns = 0;
		$x = $x->Read_FK($_SESSION['id_usuario']);
		foreach($x as $xx){
			$meusforuns += 1;
		}
		$pagina = intval($_GET['pagina']);
		$num_paginas = ceil($meusforuns/$item_por_pag);

		$item = 0;
		for($a = 0; $a<$pagina; $a++){
			$item = $item+$item_por_pag;
		}

		$foruns = new Foruns();
		$foruns = $foruns->Read_FK_paginacao($_SESSION['id_usuario'], $item, $item_por_pag);


		?>

		<!-- News -->
		<div class="news" style="margin-top: -7em;">
			<div class="container">
				<div class="row">

					<div class="col-lg-12">
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_novo_forum">Novo</button>
						<br><br>

						<?php 
							if(empty($foruns)) {
								echo '<h4 class="text-center">Ainda não existem Fóruns</h4>';
							}else{
						?>
						<table class="table">
							<thead class="thead-light">
								<tr style="font-size: 16px;">
									<th style="width: 90%">Título</th>
									<th class="text-center">Excluir</th>
								</tr>
							</thead>
							<tbody style="color: #222; font-weight: 600; font-size: 15px;">
								<?php 
								foreach($foruns as $foruns) {
									?>
									<tr>
										<td><a href="forum.php?id=<?php echo $foruns['id_forum']; ?>" style="color: #5c18af;"><?php echo $foruns['titulo_forum']; ?></a></td>
										<td class="text-center delete" id="<?php echo $foruns['id_forum']; ?>">X</td>
									</tr>
									<?php 
								}
								?>
							</tbody>
						</table>
						
						<br>
						<!-- Page Nav -->
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
											<li style="background: #5c18af; padding: 0.1em 0.3em; border-radius: 5px; font-family: arial;"><a class="active" style="color: #fff;" href="criar.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
										<?php }else { ?>
											<li style="padding: 0.1em 0.3em; border-radius: 5px; font-family: arial;"><a href="criar.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
											<?php 
										}
									} if($pagina < $num_paginas-$lim_links-1){echo "<li>. . .</li>";}
								}
								?>
							</ul>
						</div>
						<?php } ?>
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
	<div class="modal fade bd-example-modal-lg" id="modal_novo_forum" tabindex="-1" role="dialog" aria-labelledby="modal_novo_forum" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
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
									<input type="text" class="contact_input" id="titulo_forum" placeholder="Titulo *" required="required" maxlength="200">
								</div>
								<div class="col-md-12">
									<label for="comment" style="color: #222; font-size: 18px;">Descrição *</label>
									<textarea class="form-control" rows="5" style="resize: none; color: black; background: #fff; border: 2px solid #8e00c5;font-size: 1.2em;margin-bottom: 0.5em;" id="descricao"></textarea>
								</div>
							</div>
						</form>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" id="criar" class="btn btn-primary1">Criar</button>
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

			
			$('#criar').click(function(e) {
				e.preventDefault();

				var titulo_forum = $('#titulo_forum').val();
				var descricao = $('#descricao').val();
				var fk_usuario = "<?php echo $_SESSION['id_usuario']; ?>";


				if(titulo_forum == "" || descricao == ""){
					alert('Preencha todos os campos que possuem *');
				} else {
					$.ajax({
						url: 'engine/controllers/foruns.php',
						data : {
							titulo_forum: titulo_forum,
							descricao : descricao,
							fk_usuario : fk_usuario,

							action: 'create'
						},
						success: function(data){
							if(data === 'true'){
								alert("Cadastro Realizado com Sucesso!");
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

			$('.delete').click(function(e) {
				e.preventDefault();

				var id_forum = $(this).attr('id');
				
				var r = confirm("Deseja Deletar este fórum?");
				if (r == true) {
					$.ajax({
						url: 'engine/controllers/foruns.php',
						data : {
							id_forum: id_forum,

							action: 'delete'
						},
						success: function(data){
							if(data === 'true'){
								alert("Fórum Deletado!");
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