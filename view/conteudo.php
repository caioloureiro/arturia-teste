<?php require 'conteudo-titulo.php'; ?>

<section class="conteudo conteudo">

	<div class="box">
	
		<?php

			foreach( $paginas as $item ){
				
				if( $item['pagina'] == $_GET['pagina'] ){ echo $item['texto']; }
				
			}
			
		?>		
		
	</div>

</section>