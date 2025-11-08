<!-- Start - view/home-0.php !-->
<main>
	<div class="container">
		<h1 class="titulo-pagina">Catálogo de Produtos</h1>
		<div class="grid-produtos" id="grid-produtos"></div>
	</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
	setTimeout(function() {
		DB.buscarProdutos(function(produtos) {
			const grid = document.getElementById('grid-produtos');
			grid.innerHTML = '';
			produtos.forEach(function(produto) {
				const card = document.createElement('div');
				card.className = 'card-produto';
				card.innerHTML = '<img src="' + produto.imagem + '" alt="' + produto.descricao + '"><div class="card-produto-info"><div class="card-produto-codigo">' + produto.codigo + '</div><div class="card-produto-descricao">' + produto.descricao + '</div><div class="card-produto-preco">R$ ' + produto.preco.toFixed(2).replace('.', ',') + '</div><button class="btn btn-primario btn-block" onclick="adicionarAoCarrinho(' + produto.id + ')">Adicionar ao Carrinho</button></div>';
				grid.appendChild(card);
			});
		});
	}, 500);
});
function adicionarAoCarrinho(produtoId) {
	DB.buscarProdutoPorId(produtoId, function(produto) {
		Carrinho.adicionar(produto);
	});
}
</script>
<!-- End - view/home-0.php !-->