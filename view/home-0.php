<!-- Start - view/home-0.php -->
<?php require 'model/produtos.php'; ?>
<main>
	<div class="container">
		<h1 class="titulo-pagina">Catálogo de Produtos</h1>
		<div class="grid-produtos" id="grid-produtos">
			<?php if (empty($produtos_array)): ?>
				<div style="grid-column: 1/-1; text-align: center; padding: 3vw;">
					<h2>Nenhum produto disponível</h2>
					<p>Verifique se o banco de dados está configurado corretamente.</p>
				</div>
			<?php else: ?>
				<?php foreach ($produtos_array as $produto): ?>
					<div class="card-produto">
						<img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['descricao']; ?>">
						<div class="card-produto-info">
							<div class="card-produto-codigo"><?php echo $produto['codigo']; ?></div>
							<div class="card-produto-descricao"><?php echo $produto['descricao']; ?></div>
							<div class="card-produto-preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>
							<button class="btn btn-primario btn-block" onclick="adicionarAoCarrinho(<?php echo htmlspecialchars(json_encode($produto), ENT_QUOTES, 'UTF-8'); ?>)">
								Adicionar ao Carrinho
							</button>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</main>
<script>
	function adicionarAoCarrinho(produto) {
		Carrinho.adicionar(produto);
	}
</script>
<!-- End - view/home-0.php -->