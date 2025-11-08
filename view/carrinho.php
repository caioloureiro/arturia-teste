<!-- Start - view/carrinho.php !-->
<main>
	<div class="container">
		<h1 class="titulo-pagina">Meu Carrinho</h1>
		<div class="carrinho-container" id="carrinho-container"></div>
	</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
	setTimeout(function() {
		renderizarCarrinho();
	}, 500);
});
function renderizarCarrinho() {
	const container = document.getElementById('carrinho-container');
	if (Carrinho.itens.length === 0) {
		container.innerHTML = '<div class="carrinho-vazio"><h2>Seu carrinho está vazio</h2><p>Adicione produtos para continuar comprando</p><a href="/" class="btn btn-primario" style="margin-top:2vw;">Ver Produtos</a></div>';
		return;
	}
	let html = '';
	Carrinho.itens.forEach(function(item) {
		html += '<div class="item-carrinho"><img src="' + item.imagem + '" alt="' + item.descricao + '" class="item-carrinho-img"><div class="item-carrinho-info"><div class="item-carrinho-descricao">' + item.descricao + '</div><div class="item-carrinho-codigo">' + item.codigo + '</div><div class="item-carrinho-preco">R$ ' + item.preco.toFixed(2).replace('.', ',') + '</div></div><div class="item-carrinho-qtd"><button class="btn-qtd" onclick="diminuirQtd(' + item.id + ')">-</button><span class="qtd-valor">' + item.quantidade + '</span><button class="btn-qtd" onclick="aumentarQtd(' + item.id + ')">+</button></div><button class="btn btn-erro" onclick="removerItem(' + item.id + ')">Remover</button></div>';
	});
	html += '<div class="carrinho-total"><span class="carrinho-total-label">Total:</span><span class="carrinho-total-valor">R$ ' + Carrinho.obterTotal().toFixed(2).replace('.', ',') + '</span></div>';
	html += '<button class="btn btn-sucesso btn-block" style="margin-top:2vw;" onclick="finalizarPedido()">Finalizar Pedido</button>';
	container.innerHTML = html;
}
function aumentarQtd(produtoId) {
	Carrinho.aumentarQuantidade(produtoId);
	renderizarCarrinho();
}
function diminuirQtd(produtoId) {
	Carrinho.diminuirQuantidade(produtoId);
	renderizarCarrinho();
}
function removerItem(produtoId) {
	if (confirm('Deseja remover este item do carrinho?')) {
		Carrinho.remover(produtoId);
		renderizarCarrinho();
	}
}
function finalizarPedido() {
	Carrinho.finalizar(function(pedidoId) {
		window.location.href = '/?pagina=pedidos&sucesso=' + pedidoId;
	});
}
</script>
<!-- End - view/carrinho.php !-->
