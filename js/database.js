/* Start - js/database.js */
const DB = {
	db: null,
	nome: 'EcommerceDB',
	versao: '1.0',
	descricao: 'Banco de dados do E-commerce',
	tamanho: 5 * 1024 * 1024,
	init: function() {
		if (!window.openDatabase) {
			console.error('WebSQL não suportado');
			alert('Seu navegador não suporta WebSQL. Por favor, use Chrome ou Safari.');
			return;
		}
		try {
			this.db = openDatabase(this.nome, this.versao, this.descricao, this.tamanho);
			this.criarTabelas();
			console.log('Banco de dados inicializado com sucesso');
		} catch (e) {
			console.error('Erro ao inicializar banco:', e);
			alert('Erro ao inicializar banco de dados: ' + e.message);
		}
	},
	criarTabelas: function() {
		const self = this;
		this.db.transaction(function(tx) {
			tx.executeSql('CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nome TEXT, email TEXT, created_at DATETIME)');
			tx.executeSql('CREATE TABLE IF NOT EXISTS produtos (id INTEGER PRIMARY KEY, codigo TEXT, descricao TEXT, preco REAL, imagem TEXT)');
			tx.executeSql('CREATE TABLE IF NOT EXISTS pedidos (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario_id INTEGER, total REAL, status TEXT, created_at DATETIME)');
			tx.executeSql('CREATE TABLE IF NOT EXISTS itens_pedido (id INTEGER PRIMARY KEY AUTOINCREMENT, pedido_id INTEGER, produto_id INTEGER, quantidade INTEGER, preco_unitario REAL)');
		}, function(error) {
			console.error('Erro ao criar tabelas:', error);
		}, function() {
			console.log('Tabelas criadas com sucesso');
			self.criarUsuarioFicticio();
			self.popularProdutos();
		});
	},
	criarUsuarioFicticio: function() {
		this.db.transaction(function(tx) {
			tx.executeSql('SELECT COUNT(*) as total FROM usuarios', [], function(tx, resultado) {
				if (resultado.rows.item(0).total === 0) {
					tx.executeSql('INSERT INTO usuarios (id, nome, email, created_at) VALUES (?, ?, ?, ?)', 
						[1, 'Usuário Teste', 'usuario@teste.com', new Date().toISOString()]);
				}
			});
		});
	},
	popularProdutos: function() {
		this.db.transaction(function(tx) {
			tx.executeSql('SELECT COUNT(*) as total FROM produtos', [], function(tx, resultado) {
				if (resultado.rows.item(0).total === 0) {
					const produtos = [
						{codigo: 'PROD001', descricao: 'Notebook Gamer', preco: 4500.00, imagem: 'https://via.placeholder.com/300x300/667eea/ffffff?text=Notebook'},
						{codigo: 'PROD002', descricao: 'Mouse Wireless', preco: 89.90, imagem: 'https://via.placeholder.com/300x300/764ba2/ffffff?text=Mouse'},
						{codigo: 'PROD003', descricao: 'Teclado Mecânico', preco: 350.00, imagem: 'https://via.placeholder.com/300x300/f093fb/ffffff?text=Teclado'},
						{codigo: 'PROD004', descricao: 'Monitor 27" Full HD', preco: 1200.00, imagem: 'https://via.placeholder.com/300x300/4facfe/ffffff?text=Monitor'},
						{codigo: 'PROD005', descricao: 'Headset Gamer', preco: 299.00, imagem: 'https://via.placeholder.com/300x300/00f2fe/ffffff?text=Headset'},
						{codigo: 'PROD006', descricao: 'Webcam Full HD', preco: 450.00, imagem: 'https://via.placeholder.com/300x300/43e97b/ffffff?text=Webcam'},
						{codigo: 'PROD007', descricao: 'SSD 1TB NVMe', preco: 650.00, imagem: 'https://via.placeholder.com/300x300/38f9d7/ffffff?text=SSD'},
						{codigo: 'PROD008', descricao: 'Placa de Vídeo RTX', preco: 3800.00, imagem: 'https://via.placeholder.com/300x300/667eea/ffffff?text=GPU'},
						{codigo: 'PROD009', descricao: 'Cadeira Gamer', preco: 1100.00, imagem: 'https://via.placeholder.com/300x300/764ba2/ffffff?text=Cadeira'},
						{codigo: 'PROD010', descricao: 'Mousepad RGB', preco: 120.00, imagem: 'https://via.placeholder.com/300x300/f093fb/ffffff?text=Mousepad'}
					];
					produtos.forEach(function(p) {
						tx.executeSql('INSERT INTO produtos (codigo, descricao, preco, imagem) VALUES (?, ?, ?, ?)',
							[p.codigo, p.descricao, p.preco, p.imagem]);
					});
				}
			});
		});
	},
	buscarProdutos: function(callback) {
		this.db.transaction(function(tx) {
			tx.executeSql('SELECT * FROM produtos ORDER BY descricao', [], function(tx, resultado) {
				const produtos = [];
				for (let i = 0; i < resultado.rows.length; i++) {
					produtos.push(resultado.rows.item(i));
				}
				callback(produtos);
			});
		});
	},
	buscarProdutoPorId: function(id, callback) {
		this.db.transaction(function(tx) {
			tx.executeSql('SELECT * FROM produtos WHERE id = ?', [id], function(tx, resultado) {
				if (resultado.rows.length > 0) {
					callback(resultado.rows.item(0));
				}
			});
		});
	},
	criarPedido: function(carrinho, callback) {
		const usuarioId = 1;
		let total = 0;
		carrinho.forEach(function(item) {
			total += item.preco * item.quantidade;
		});
		this.db.transaction(function(tx) {
			tx.executeSql('INSERT INTO pedidos (usuario_id, total, status, created_at) VALUES (?, ?, ?, ?)',
				[usuarioId, total, 'confirmado', new Date().toISOString()],
				function(tx, resultado) {
					const pedidoId = resultado.insertId;
					carrinho.forEach(function(item) {
						tx.executeSql('INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)',
							[pedidoId, item.id, item.quantidade, item.preco]);
					});
					if (callback) callback(pedidoId);
				}
			);
		});
	},
	buscarPedidos: function(callback) {
		const usuarioId = 1;
		this.db.transaction(function(tx) {
			tx.executeSql('SELECT * FROM pedidos WHERE usuario_id = ? ORDER BY created_at DESC', [usuarioId], function(tx, resultado) {
				const pedidos = [];
				let processados = 0;
				if (resultado.rows.length === 0) {
					callback([]);
					return;
				}
				for (let i = 0; i < resultado.rows.length; i++) {
					const pedido = resultado.rows.item(i);
					tx.executeSql('SELECT ip.*, p.descricao, p.codigo FROM itens_pedido ip INNER JOIN produtos p ON ip.produto_id = p.id WHERE ip.pedido_id = ?',
						[pedido.id],
						function(tx, resItens) {
							pedido.itens = [];
							for (let j = 0; j < resItens.rows.length; j++) {
								pedido.itens.push(resItens.rows.item(j));
							}
							pedidos.push(pedido);
							processados++;
							if (processados === resultado.rows.length) {
								callback(pedidos);
							}
						}
					);
				}
			});
		});
	}
};
document.addEventListener('DOMContentLoaded', function() {
	DB.init();
});
/* End - js/database.js */
