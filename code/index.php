<?php


?>




		<!DOCTYPE html>
		<html lang="es">

		<head>
			<title>Latincarb Login</title>
			<!-- Meta tag Keywords -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta charset="UTF-8" />
			<meta name="descripcion" content="Aplicación lógistica Latinoamericana de carbón ltda">
			<meta name="keywords" content="latincarb, latincarb.com, latinoamericana de carbon, latinoamericana de carbón, latincarb aplicaion, carbon, carbón">
			<!-- <meta name="keywords"
		content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /> -->
			<script>
				addEventListener("load", function() {
					setTimeout(hideURLbar, 0);
				}, false);

				function hideURLbar() {
					window.scrollTo(0, 1);
				}
			</script>
			<!-- //Meta tag Keywords -->
			<!--/Style-CSS -->
			<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="icon" href="images/ensayo.png">
			<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
			<!--//Style-CSS -->
		</head>

		<body>
			<!-- /login-section -->

			<section class="w3l-forms-23">
				<div class="forms23-block-hny">
					<div class="wrapper">
						<h1>INICIAR SESIÓN</h1>
						<!-- if logo is image enable this   
					<a class="logo" href="index.html">
					  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
					</a> 
				-->
						<div class="d-grid forms23-grids">
							<div class="form23">
								<div class="main-bg">
									<h6 class="sec-one"></h6>
									<div class="speci-login first-look">
										<img src="images/user.png" alt="" class="img-responsive">
									</div>
								</div>
								<div class="bottom-content">
									<form action="#" method="post">
								<?php
									include_once('includes/login.php')
								?>
								<input type="text" name="username" class="input-form" placeholder="Usuario" required="required" />
								<input type="password" name="password" class="input-form" placeholder="Contraseña" required="required" />
								
								<button type="submit" class="loginhny-btn btn" data-toggle="modal" data-target="#contenidoModal" name="login">Iniciar Sesión</button>
									</form>

								</div>
							</div>
						</div>
						<div class="w3l-copy-right text-center">
							<p>Copyright © 2020 | Latincarb 
							</p>
						</div>
					</div>
				</div>
			</section>
			<!-- //login-section -->
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.bundle.min.js"></script>
		</body>

		</html>