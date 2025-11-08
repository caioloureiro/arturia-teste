<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<title>Erro 404</title>
		<meta charset="utf-8"/>
		
	</head>
	
	<body>
		
		<style>
			h3{ font-size:2vw; }
			p{ font-size:1vw; }
			.separador{ height:1vw; }
			@media only screen and (max-width:1024px){
				h3{ font-size:6vw; }
				p{ font-size:3vw; }
				.separador{ height:15vw; }
			}
		</style>
		
		<!-- Start - view/404.php !-->
		<section class="home-01" title="home-01" style="height:100vh;">
		
			<div class="box">
			
				<div class="separador"></div>
				
				<h3>Erro 404</h3>
				
				<div class="separador"></div>
				
				<p>
					<?php 
						$actual_link = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
						echo $actual_link; 
					?>
				</p>
				
				<div class="separador"></div>
				
				<p>Ops... Este endereço está errado.</p>
				
			</div>
			
		</section>
		<!-- End - view/404.php !-->
		
	</body>
	
</html>