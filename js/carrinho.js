/* Start - js/carrinho.js */
const Carrinho = {
	itens: [],
	init: function() {
		this.carregarCarrinho();
		this.atualizarBadge();
	},
	carregarCarrinho: function() {
		const carrinhoSalvo = localStorage.getItem('carrinho');
		if (carrinhoSalvo) {
			this.itens = JSON.parse(carrinhoSalvo);
		}
	},
	salvarCarrinho: function() {
		localStorage.setItem('carrinho', JSON.stringify(this.itens));
		this.atualizarBadge();
	},
	adicionar: function(produto) {
		const itemExistente = this.itens.find(function(item) {
			return item.id === produto.id;
		});
		if (itemExistente) {
			itemExistente.quantidade++;
		} else {
			this.itens.push({
				id: produto.id,
				codigo: produto.codigo,
				descricao: produto.descricao,
				preco: produto.preco,
				imagem: produto.imagem,
				quantidade: 1
			});
		}
		this.salvarCarrinho();
		this.mostrarNotificacao('Produto adicionado ao carrinho!');
	},
	remover: function(produtoId) {
		this.itens = this.itens.filter(function(item) {
			return item.id !== produtoId;
		});
		this.salvarCarrinho();
	},
	aumentarQuantidade: function(produtoId) {
		const item = this.itens.find(function(item) {
			return item.id === produtoId;
		});
		if (item) {
			item.quantidade++;
			this.salvarCarrinho();
		}
	},
	diminuirQuantidade: function(produtoId) {
		const item = this.itens.find(function(item) {
			return item.id === produtoId;
		});
		if (item) {
			if (item.quantidade > 1) {
				item.quantidade--;
			} else {
				this.remover(produtoId);
			}
			this.salvarCarrinho();
		}
	},
	obterTotal: function() {
		return this.itens.reduce(function(total, item) {
			return total + (item.preco * item.quantidade);
		}, 0);
	},
	obterQuantidadeTotal: function() {
		return this.itens.reduce(function(total, item) {
			return total + item.quantidade;
		}, 0);
	},
	limpar: function() {
		this.itens = [];
		this.salvarCarrinho();
	},
	atualizarBadge: function() {
		const badge = document.querySelector('.carrinho-badge');
		if (badge) {
			const quantidade = this.obterQuantidadeTotal();
			badge.textContent = quantidade;
			badge.style.display = quantidade > 0 ? 'inline-block' : 'none';
		}
	},
	mostrarNotificacao: function(mensagem) {
		const notificacao = document.createElement('div');
		notificacao.style.cssText = 'position:fixed;top:2vw;right:2vw;background-color:var(--corSucesso);color:white;padding:1vw 2vw;border-radius:0.5vw;z-index:9999;animation:slideIn 0.3s ease;';
		notificacao.textContent = mensagem;
		document.body.appendChild(notificacao);
		setTimeout(function() {
			notificacao.remove();
		}, 3000);
	},
	finalizar: function(callback) {
		if (this.itens.length === 0) {
			alert('Carrinho vazio!');
			return;
		}
		DB.criarPedido(this.itens, function(pedidoId) {
			Carrinho.limpar();
			if (callback) callback(pedidoId);
		});
	}
};
document.addEventListener('DOMContentLoaded', function() {
	setTimeout(function() {
		Carrinho.init();
	}, 500);
});
/* End - js/carrinho.js */
