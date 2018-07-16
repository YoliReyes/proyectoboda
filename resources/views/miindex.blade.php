<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Imanol & Yoli</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		
		<link rel="stylesheet" href="css/countdown.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/nuevasFuentes.css">
		<link rel="stylesheet" href="css/misestilos.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>	
		
	</head>

	<body class="page1" id="top">

		<div class="main">
<!--==============================header=================================-->
			<header>
				<div>
					<img class="imgdestacados" src="images/cabecera.png" alt="Nos casamos">					
				</div>
			</header>				
<!--==============================Content=================================-->
			<div class="content">

				<div class="cajacontador">
					<div class="count_wrap">
						<div id="counter"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>

				
				<div class="cajacodigo">

					<div class="paddtop">
						<img src="images/confirmacion-codigo.png" alt="codigo de confirmación">					
					</div>
					
					<div class="cajaformulario">

						<p>Introduce aquí el código adjunto a tu invitación</p>

						<form id="form" action="{{ url('/confirmacion') }}" method="post">
						{{ csrf_field() }}
							
							<div>
								<label class="message">
									<input name="codigo" placeholder="Código de confirmación:" maxlength ="6" minlength ="6" required pattern="^\d+$" />
								</label>
							</div>
									
							<div>
								<div class="clear"></div>
								<div>
									<button type="submit" class="btn sinborde">Acceder</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="clear"></div>
<!--==============================footer=================================-->
			<footer class="pie">
				<div>
					<img class="imgdestacados" src="images/footer.png" alt="Nos casamos">					
				</div>
			</footer>
		
		<div>
	</body>
</html>

<script src="js/jquery.countdown.js"></script>
<script src="js/cd_config.js"></script>

