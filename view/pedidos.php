<!-- Start - view/pedidos.php !-->
<main>
	<div class="container">
		<h1 class="titulo-pagina">Meus Pedidos</h1>
		<div id="mensagem-sucesso"></div>
		<div class="pedidos-lista" id="pedidos-lista"></div>
	</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
	setTimeout(function() {
		const urlParams = new URLSearchParams(window.location.search);
		const sucesso = urlParams.get('sucesso');
		if (sucesso) {
			const mensagemDiv = document.getElementById('mensagem-sucesso');
			mensagemDiv.innerHTML = '<div class="mensagem-sucesso">Pedido #' + sucesso + ' realizado com sucesso!</div>';
			window.history.replaceState({}, document.title, '/?pagina=pedidos');
		}
		renderizarPedidos();
	}, 500);
});
function renderizarPedidos() {
	DB.buscarPedidos(function(pedidos) {
		const lista = document.getElementById('pedidos-lista');
		if (pedidos.length === 0) {
			lista.innerHTML = '<div class="carrinho-vazio"><h2>Você ainda não fez nenhum pedido</h2><p>Comece a comprar agora!</p><a href="/" class="btn btn-primario" style="margin-top:2vw;">Ver Produtos</a></div>';
			return;
		}
		let html = '';
		pedidos.forEach(function(pedido) {
			const data = new Date(pedido.created_at);
			const dataFormatada = data.toLocaleDateString('pt-BR') + ' ' + data.toLocaleTimeString('pt-BR');
			html += '<div class="card-pedido"><div class="pedido-header"><div><div class="pedido-numero">Pedido #' + pedido.id + '</div><div class="pedido-data">' + dataFormatada + '</div></div><div class="pedido-status">' + pedido.status + '</div></div><div class="pedido-itens">';
			pedido.itens.forEach(function(item) {
				html += '<div class="pedido-item"><span class="pedido-item-nome">' + item.descricao + ' <span class="pedido-item-qtd">(' + item.codigo + ')</span></span><span class="pedido-item-qtd">x' + item.quantidade + '</span><span class="pedido-item-preco">R$ ' + (item.preco_unitario * item.quantidade).toFixed(2).replace('.', ',') + '</span></div>';
			});
			html += '</div><div class="pedido-total"><span>Total do Pedido:</span><span class="pedido-total-valor">R$ ' + pedido.total.toFixed(2).replace('.', ',') + '</span></div></div>';
		});
		lista.innerHTML = html;
	});
}
</script>
<!-- End - view/pedidos.php !-->
