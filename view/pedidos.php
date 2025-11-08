<!-- Start - view/pedidos.php !-->
<?php require 'model/pedidos.php'; ?>
<main>
	<div class="container">
		<h1 class="titulo-pagina">Meus Pedidos</h1>
		
		<?php if( isset($_GET['sucesso']) ): ?>
			<div class="mensagem-sucesso">
				Pedido #<?php echo $_GET['sucesso']; ?> realizado com sucesso!
			</div>
		<?php endif; ?>
		
		<div class="pedidos-lista" id="pedidos-lista">
			<?php if( empty($pedidos_array) ): ?>
				<div class="carrinho-vazio">
					<h2>Você ainda não fez nenhum pedido</h2>
					<p>Comece a comprar agora!</p>
					<a href="/" class="btn btn-primario" style="margin-top:2vw;">Ver Produtos</a>
				</div>
			<?php else: ?>
				<?php foreach( $pedidos_array as $pedido ): ?>
					<div class="card-pedido">
						<div class="pedido-header">
							<div>
								<div class="pedido-numero">Pedido #<?php echo $pedido['id']; ?></div>
								<div class="pedido-data"><?php echo date('d/m/Y H:i', strtotime($pedido['created_at'])); ?></div>
							</div>
							<div class="pedido-status"><?php echo $pedido['status']; ?></div>
						</div>
						<div class="pedido-itens">
							<?php foreach( $pedido['itens'] as $item ): ?>
								<div class="pedido-item">
									<span class="pedido-item-nome">
										<?php echo $item['descricao']; ?> 
										<span class="pedido-item-qtd">(<?php echo $item['codigo']; ?>)</span>
									</span>
									<span class="pedido-item-qtd">x<?php echo $item['quantidade']; ?></span>
									<span class="pedido-item-preco">
										R$ <?php echo number_format($item['preco_unitario'] * $item['quantidade'], 2, ',', '.'); ?>
									</span>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="pedido-total">
							<span>Total do Pedido:</span>
							<span class="pedido-total-valor">R$ <?php echo number_format($pedido['total'], 2, ',', '.'); ?></span>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</main>
<!-- End - view/pedidos.php !-->
