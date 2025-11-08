<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<?php
			require "routes/main.php";
			require "routes/model.php";
		?>

		<title><?php echo $head_title ?></title>

		<?php require "view/head.php" ?>
		
	</head>

	<body>
		
		<style><?php require 'routes/css.php'; ?></style>
		
		<?php require "view/scripts-top.php" ?>

		<main class="container" itemscope>
			
			<?php
				
				if( !isset( $_GET['pagina'] ) ){
					
					//echo'<script> alert("home"); </script>';
					require 'routes/home.php';
					
				}else{
					
					$pagina_existe = 'nao';
					
					/* Start - PAGINAS FIXAS*/
					foreach( $paginas_fixas as $pagina ){

						if( $_GET['pagina'] == $pagina['nome'] ){
							require 'routes/'. $pagina['nome'] .'.php';
							$pagina_existe = 'sim';
						}

					}
					/*End - PAGINAS FIXAS*/
					
					/* Start - PAGINAS DINÂMICAS - DENTRO DO BANCO OU ARRAY */
					foreach( $paginas as $pagina ){
						
						//echo'<script> alert("'.$_GET['pagina'].'"); </script>';
						
						if( $_GET['pagina'] == $pagina['pagina'] ){
							$titulo_da_pagina = $pagina['titulo'];
							require 'routes/conteudo.php';
							$pagina_existe = 'sim';
						}
						
					}
					/* End - PAGINAS DINÂMICAS - DENTRO DO BANCO OU ARRAY */
					
					if( $pagina_existe == 'nao' ){ require 'routes/404.php'; } //PÁGINA NÃO EXISTE
					
				}
				
			?>
			
		</main>
		
		<?php require "view/scripts-bottom.php" ?>
		
	</body>

</html>