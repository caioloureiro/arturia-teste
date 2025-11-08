-- Start - sql/estrutura.sql

CREATE TABLE IF NOT EXISTS `usuarios` (
	`id` INT PRIMARY KEY,
	`nome` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`created_at` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `produtos` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`codigo` VARCHAR(50) NOT NULL,
	`descricao` VARCHAR(255) NOT NULL,
	`preco` DECIMAL(10,2) NOT NULL,
	`imagem` VARCHAR(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `pedidos` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`usuario_id` INT NOT NULL,
	`total` DECIMAL(10,2) NOT NULL,
	`status` VARCHAR(50) NOT NULL,
	`created_at` DATETIME NOT NULL,
	FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `itens_pedido` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`pedido_id` INT NOT NULL,
	`produto_id` INT NOT NULL,
	`quantidade` INT NOT NULL,
	`preco_unitario` DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
	FOREIGN KEY (produto_id) REFERENCES produtos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios (id, nome, email, created_at) VALUES 
(1, 'Usuário Teste', 'usuario@teste.com', NOW());

INSERT INTO produtos (codigo, descricao, preco, imagem) VALUES 
('PROD001', 'Notebook Gamer', 4500.00, 'https://via.placeholder.com/300x300/667eea/ffffff?text=Notebook'),
('PROD002', 'Mouse Wireless', 89.90, 'https://via.placeholder.com/300x300/764ba2/ffffff?text=Mouse'),
('PROD003', 'Teclado Mecânico', 350.00, 'https://via.placeholder.com/300x300/f093fb/ffffff?text=Teclado'),
('PROD004', 'Monitor 27" Full HD', 1200.00, 'https://via.placeholder.com/300x300/4facfe/ffffff?text=Monitor'),
('PROD005', 'Headset Gamer', 299.00, 'https://via.placeholder.com/300x300/00f2fe/ffffff?text=Headset'),
('PROD006', 'Webcam Full HD', 450.00, 'https://via.placeholder.com/300x300/43e97b/ffffff?text=Webcam'),
('PROD007', 'SSD 1TB NVMe', 650.00, 'https://via.placeholder.com/300x300/38f9d7/ffffff?text=SSD'),
('PROD008', 'Placa de Vídeo RTX', 3800.00, 'https://via.placeholder.com/300x300/667eea/ffffff?text=GPU'),
('PROD009', 'Cadeira Gamer', 1100.00, 'https://via.placeholder.com/300x300/764ba2/ffffff?text=Cadeira'),
('PROD010', 'Mousepad RGB', 120.00, 'https://via.placeholder.com/300x300/f093fb/ffffff?text=Mousepad');

-- End - sql/estrutura.sql
