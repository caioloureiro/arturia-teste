/* Start - js/carrinho.js */
const Carrinho = {
	itens: [],
	init: function() {
		const carrinhoSalvo = localStorage.getItem('carrinho');
		if (carrinhoSalvo) {
			this.itens = JSON.parse(carrinhoSalvo);
		}
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
				preco: parseFloat(produto.preco),
				imagem: produto.imagem,
				quantidade: 1
			});
		}
		this.salvarCarrinho();
		this.atualizarBadge();
		this.mostrarNotificacao('Produto adicionado ao carrinho!');
	},
	remover: function(produtoId) {
		console.log('Removendo produto ID:', produtoId);
		this.itens = this.itens.filter(function(item) {
			return parseInt(item.id) !== parseInt(produtoId);
		});
		console.log('Carrinho após remover:', this.itens);
		this.salvarCarrinho();
		this.atualizarBadge();
	},
	aumentarQuantidade: function(produtoId) {
		const item = this.itens.find(function(item) {
			return parseInt(item.id) === parseInt(produtoId);
		});
		if (item) {
			item.quantidade++;
			this.salvarCarrinho();
		}
	},
	diminuirQuantidade: function(produtoId) {
		const item = this.itens.find(function(item) {
			return parseInt(item.id) === parseInt(produtoId);
		});
		if (item && item.quantidade > 1) {
			item.quantidade--;
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
	finalizar: function(callback) {
		const self = this;
		fetch('controller/salvar_pedido.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({
				carrinho: this.itens
			})
		})
		.then(function(response) {
			console.log('Resposta do servidor:', response.status);
			return response.text();
		})
		.then(function(text) {
			console.log('Texto recebido:', text);
			const data = JSON.parse(text);
			if (data.sucesso) {
				self.itens = [];
				self.salvarCarrinho();
				self.atualizarBadge();
				if (callback) callback(data.pedido_id);
			} else {
				alert('Erro ao finalizar pedido: ' + data.mensagem);
			}
		})
		.catch(function(error) {
			console.error('Erro na requisição:', error);
			alert('Erro ao finalizar pedido: ' + error.message);
		});
	},
	limpar: function() {
		this.itens = [];
		this.salvarCarrinho();
		this.atualizarBadge();
	},
	salvarCarrinho: function() {
		localStorage.setItem('carrinho', JSON.stringify(this.itens));
	},
	atualizarBadge: function() {
		const badge = document.querySelector('.carrinho-badge');
		if (badge) {
			const quantidade = this.obterQuantidadeTotal();
			badge.textContent = quantidade;
			badge.style.display = quantidade > 0 ? 'block' : 'none';
		}
	},
	mostrarNotificacao: function(mensagem) {
		const notificacao = document.createElement('div');
		notificacao.className = 'notificacao-carrinho';
		notificacao.textContent = mensagem;
		document.body.appendChild(notificacao);
		setTimeout(function() {
			notificacao.classList.add('mostrar');
		}, 100);
		setTimeout(function() {
			notificacao.classList.remove('mostrar');
			setTimeout(function() {
				document.body.removeChild(notificacao);
			}, 300);
		}, 2000);
	}
};
document.addEventListener('DOMContentLoaded', function() {
	Carrinho.init();
});
/* End - js/carrinho.js */
