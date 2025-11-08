# E-commerce - Teste Prático Arturia

## 📋 Descrição do Projeto

Aplicação web de e-commerce desenvolvida para o processo seletivo de Dev JavaScript da Arturia. A aplicação permite que usuários visualizem produtos, adicionem ao carrinho e finalizem compras, além de consultar o histórico de pedidos.

## 🚀 Tecnologias Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7+ com MySQL
- **Banco de Dados**: MySQL 5.7+
- **Servidor Local**: WAMP64 (Windows)
- **Arquitetura**: MVC Simplificado

## ✨ Funcionalidades Implementadas

### 1. Catálogo de Produtos
- Listagem de 10 produtos com código, descrição, preço e imagem
- Layout em grid responsivo
- Dados carregados do MySQL via PHP
- Botão "Adicionar ao Carrinho"

### 2. Carrinho de Compras
- Adicionar/remover produtos
- Aumentar/diminuir quantidade com botões +/-
- Cálculo automático do total
- Badge com quantidade de itens no menu
- Persistência via LocalStorage

### 3. Finalização de Pedido
- Salvar pedido no MySQL via API PHP
- Gerar número do pedido automaticamente
- Limpar carrinho após finalização
- Mensagem de sucesso com ID do pedido

### 4. Consulta de Pedidos
- Listagem de todos os pedidos do usuário
- Detalhes de cada pedido (produtos, quantidades, valores)
- Data, hora e status do pedido

### 5. Design Responsivo
- Layout adaptável para desktop e mobile
- Media queries para diferentes tamanhos de tela
- Interface moderna e intuitiva

## 🗄️ Estrutura do Banco de Dados (MySQL)

### Tabela: usuarios
```
- id (INT PRIMARY KEY AUTO_INCREMENT)
- nome (VARCHAR 255)
- email (VARCHAR 255)
- created_at (DATETIME)
```

### Tabela: produtos
```
- id (INT PRIMARY KEY AUTO_INCREMENT)
- codigo (VARCHAR 50)
- descricao (VARCHAR 255)
- preco (DECIMAL 10,2)
- imagem (VARCHAR 500)
```

### Tabela: pedidos
```
- id (INT PRIMARY KEY AUTO_INCREMENT)
- usuario_id (INT)
- total (DECIMAL 10,2)
- status (VARCHAR 50)
- created_at (DATETIME)
```

### Tabela: itens_pedido
```
- id (INT PRIMARY KEY AUTO_INCREMENT)
- pedido_id (INT)
- produto_id (INT)
- quantidade (INT)
- preco_unitario (DECIMAL 10,2)
```

## 📦 Instalação e Configuração

### Pré-requisitos
- WAMP64 instalado e rodando
- PHP 7.0 ou superior
- MySQL 5.7 ou superior
- Navegador moderno

### Passo a Passo

1. **Configurar o Banco de Dados**
   - Abra phpMyAdmin: http://localhost/phpmyadmin
   - Crie banco: `arturiateste`
   - Execute: `INSTALL_DATABASE.sql`

2. **Verificar Conexão**
   - Arquivo: `model/conexao-off.php`
   - Servidor: localhost
   - Usuário: root
   - Banco: arturiateste

3. **Iniciar Servidor PHP**
   ```bash
   cd d:\Sites\arturia-teste
   php -S localhost:8000
   ```

4. **Acessar Aplicação**
   - http://localhost:8000

## 📁 Estrutura de Arquivos

```
arturia-teste/
├── controller/
│   ├── components.php
│   ├── funcoes.php
│   └── salvar_pedido.php       (API pedidos)
├── css/
│   ├── root.css
│   ├── global.css
│   ├── home-0.css
│   ├── scrollbar.css
│   └── ecommerce.css
├── js/
│   ├── motor-top.js
│   ├── motor-bottom.js
│   └── carrinho.js             (Lógica carrinho)
├── model/
│   ├── conexao.php
│   ├── conexao-off.php
│   ├── usuarios.php
│   ├── produtos.php
│   └── pedidos.php
├── routes/
│   ├── home.php
│   ├── carrinho.php
│   └── pedidos.php
├── view/
│   ├── head.php
│   ├── cabecalho.php
│   ├── home-0.php
│   ├── carrinho.php
│   ├── pedidos.php
│   ├── footer.php
│   ├── scripts-top.php
│   └── scripts-bottom.php
├── templates/
│   └── preferences.md
├── INSTALL_DATABASE.sql
├── index.php
└── README.md
```

## 🎯 Como Usar

### Visualizar Produtos
1. Acesse: http://localhost:8000
2. Veja os 10 produtos no catálogo

### Adicionar ao Carrinho
1. Clique "Adicionar ao Carrinho"
2. Observe badge atualizar
3. Carrinho salva automaticamente

### Gerenciar Carrinho
1. Clique "Carrinho" no menu
2. Use +/- para alterar quantidades
3. Clique "Remover" para deletar itens
4. Total atualiza automaticamente

### Finalizar Pedido
1. No carrinho, clique "Finalizar Pedido"
2. Pedido salvo no MySQL
3. Redirecionado para "Meus Pedidos"
4. Mensagem de sucesso com ID

### Consultar Pedidos
1. Clique "Meus Pedidos" no menu
2. Veja histórico completo
3. Cada pedido mostra: data, produtos, total

## 🎨 Padrões de Código

### CSS
- Indentação: TAB
- Variáveis em `:root`
- Unidades VW para responsividade
- Propriedades específicas (não shorthands)

### JavaScript
- Vanilla JavaScript
- Objetos literais
- LocalStorage para persistência
- Fetch API para backend

### PHP
- Arquitetura MVC
- Arrays associativos
- MySQLi procedural

## 🎨 Cores

- **Primária**: `rgba(102, 126, 234, 1)` - Azul
- **Secundária**: `rgba(118, 75, 162, 1)` - Roxo
- **Sucesso**: `rgba(67, 233, 123, 1)` - Verde
- **Erro**: `rgba(220, 53, 69, 1)` - Vermelho

## 👨‍💻 Desenvolvedor

Desenvolvido para processo seletivo - Dev JavaScript - Arturia Tech

**Data**: Novembro de 2025  
**Contato**: rh@arturia.tech
