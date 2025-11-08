# E-commerce - Teste Prático Arturia# E-commerce - Teste Prático Arturia



## 📋 Descrição do Projeto## 📋 Descrição do Projeto



Aplicação web de e-commerce desenvolvida para o processo seletivo de Dev JavaScript da Arturia. A aplicação permite que usuários visualizem produtos, adicionem ao carrinho e finalizem compras, além de consultar o histórico de pedidos.Aplicação web de e-commerce desenvolvida para o processo seletivo de Dev JavaScript da Arturia. A aplicação permite que usuários visualizem produtos, adicionem ao carrinho e finalizem compras, além de consultar o histórico de pedidos.



## 🚀 Tecnologias Utilizadas## 🚀 Tecnologias Utilizadas



- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)

- **Backend**: PHP 7+ com MySQL- **Backend**: PHP 7+

- **Banco de Dados**: MySQL 5.7+- **Banco de Dados**: WebSQL (navegador)

- **Servidor Local**: WAMP64 (Windows)- **Arquitetura**: MVC Simplificado

- **Arquitetura**: MVC Simplificado

## ✨ Funcionalidades

## ✨ Funcionalidades

### ✅ Implementadas

### ✅ Implementadas

1. **Catálogo de Produtos**

1. **Catálogo de Produtos**   - Listagem de produtos com código, descrição, preço e imagem

   - Listagem de produtos com código, descrição, preço e imagem   - Layout em grid responsivo

   - Layout em grid responsivo   - Produtos armazenados no WebSQL

   - Dados carregados do MySQL via PHP

2. **Carrinho de Compras**

2. **Carrinho de Compras**   - Adicionar produtos ao carrinho

   - Adicionar produtos ao carrinho   - Aumentar/diminuir quantidade

   - Aumentar/diminuir quantidade   - Remover produtos

   - Remover produtos   - Cálculo automático do total

   - Cálculo automático do total   - Badge com quantidade de itens

   - Badge com quantidade de itens   - Persistência via LocalStorage

   - Persistência via LocalStorage

3. **Finalização de Pedido**

3. **Finalização de Pedido**   - Salvar pedido no WebSQL

   - Salvar pedido no MySQL via API PHP   - Gerar número do pedido

   - Gerar número do pedido automaticamente   - Limpar carrinho após finalização

   - Limpar carrinho após finalização   - Mensagem de sucesso

   - Mensagem de sucesso com ID do pedido

4. **Consulta de Pedidos**

4. **Consulta de Pedidos**   - Listagem de todos os pedidos

   - Listagem de todos os pedidos do usuário   - Detalhes de cada pedido (produtos, quantidades, valores)

   - Detalhes de cada pedido (produtos, quantidades, valores)   - Data e hora do pedido

   - Data e hora do pedido   - Status do pedido

   - Status do pedido

5. **Design Responsivo**

5. **Design Responsivo**   - Layout adaptável para desktop e mobile

   - Layout adaptável para desktop e mobile   - Media queries para diferentes tamanhos de tela

   - Media queries para diferentes tamanhos de tela   - Interface moderna e intuitiva

   - Interface moderna e intuitiva

## 🗄️ Estrutura do Banco de Dados (WebSQL)

## 🗄️ Estrutura do Banco de Dados (MySQL)

### Tabela: usuarios

### Tabela: usuarios- id (INTEGER PRIMARY KEY)

```sql- nome (TEXT)

- id (INT PRIMARY KEY)- email (TEXT)

- nome (VARCHAR 255)- created_at (DATETIME)

- email (VARCHAR 255)

- created_at (DATETIME)### Tabela: produtos

```- id (INTEGER PRIMARY KEY)

- codigo (TEXT)

### Tabela: produtos- descricao (TEXT)

```sql- preco (REAL)

- id (INT PRIMARY KEY AUTO_INCREMENT)- imagem (TEXT)

- codigo (VARCHAR 50)

- descricao (VARCHAR 255)### Tabela: pedidos

- preco (DECIMAL 10,2)- id (INTEGER PRIMARY KEY AUTOINCREMENT)

- imagem (VARCHAR 500)- usuario_id (INTEGER)

```- total (REAL)

- status (TEXT)

### Tabela: pedidos- created_at (DATETIME)

```sql

- id (INT PRIMARY KEY AUTO_INCREMENT)### Tabela: itens_pedido

- usuario_id (INT)- id (INTEGER PRIMARY KEY AUTOINCREMENT)

- total (DECIMAL 10,2)- pedido_id (INTEGER)

- status (VARCHAR 50)- produto_id (INTEGER)

- created_at (DATETIME)- quantidade (INTEGER)

```- preco_unitario (REAL)



### Tabela: itens_pedido## 📁 Estrutura de Arquivos

```sql

- id (INT PRIMARY KEY AUTO_INCREMENT)```

- pedido_id (INT)arturia-teste/

- produto_id (INT)├── controller/          # Lógica de controle

- quantidade (INT)├── model/              # Models e arrays de dados

- preco_unitario (DECIMAL 10,2)│   └── paginas_fixas.php

```├── routes/             # Rotas da aplicação

│   ├── home.php

## 📦 Instalação e Configuração│   ├── carrinho.php

│   └── pedidos.php

### Pré-requisitos├── view/               # Views/Templates

│   ├── cabecalho.php

- WAMP64 instalado e rodando│   ├── home-0.php

- PHP 7.0 ou superior│   ├── carrinho.php

- MySQL 5.7 ou superior│   └── pedidos.php

- Navegador moderno (Chrome, Firefox, Edge)├── css/                # Estilos

│   ├── root.css        # Variáveis CSS

### Passo a Passo│   └── ecommerce.css   # Estilos do e-commerce

├── js/                 # JavaScript

1. **Configurar o Banco de Dados**│   ├── database.js     # Gerenciamento WebSQL

   ```bash│   ├── carrinho.js     # Lógica do carrinho

   # Abra o phpMyAdmin (http://localhost/phpmyadmin)│   └── app.js          # Funcionalidades gerais

   # Crie um banco de dados chamado: arturiateste├── index.php           # Arquivo principal

   # Execute o arquivo INSTALL_DATABASE.sql na aba SQL└── README.md           # Documentação

   ``````



2. **Configurar Conexão**## 🎨 Diretrizes de Código

   - O arquivo `model/conexao-off.php` já está configurado para localhost

   - Verifique as credenciais:O projeto segue as diretrizes definidas em `templates/preferences.md`:

     - Servidor: `localhost`

     - Usuário: `root`- Indentação: **TAB**

     - Senha: (sua senha do MySQL)- Layout: **Float** para estruturas simples

     - Banco: `arturiateste`- CSS: Uso de **VW** para responsividade (nunca 100vw, sempre 100%)

- Cores: Variáveis CSS em `:root`

3. **Iniciar Servidor PHP**- Propriedades específicas (não shorthands)

   ```bash- Marcadores Start/End em cada arquivo

   cd d:\Sites\arturia-teste

   php -S localhost:8000## 🔧 Como Executar

   ```

1. **Requisitos**:

4. **Acessar Aplicação**   - Servidor web com PHP 7+

   - Abra o navegador em: `http://localhost:8000`   - Navegador compatível com WebSQL (Chrome ou Safari)



## 📁 Estrutura de Arquivos2. **Instalação**:

   ```bash

```   # Clone o repositório

arturia-teste/   git clone [URL_DO_REPOSITORIO]

├── controller/   

│   ├── components.php   # Navegue até a pasta

│   ├── funcoes.php   cd arturia-teste

│   └── salvar_pedido.php     # API para salvar pedidos   

├── css/   # Inicie um servidor PHP local

│   ├── dinamico.css   php -S localhost:8000

│   ├── global.css   ```

│   ├── home-0.css

│   ├── root.css              # Variáveis CSS3. **Acesso**:

│   ├── scrollbar.css   - Abra o navegador em: `http://localhost:8000`

│   └── ecommerce.css         # Estilos do e-commerce

├── js/## 📱 Compatibilidade

│   ├── motor-top.js

│   ├── motor-bottom.js- ✅ Google Chrome

│   ├── carrinho.js           # Lógica do carrinho- ✅ Safari

│   └── app.js- ✅ Opera

├── model/- ⚠️ Firefox (WebSQL descontinuado, usar Chrome ou Safari)

│   ├── arrays.php- ⚠️ Edge (usar Chrome)

│   ├── exemplo.php           # Modelo de consulta SQL

│   ├── conexao.php           # Conexão principal## 🎯 Funcionalidades Principais

│   ├── conexao-off.php       # Conexão localhost

│   ├── usuarios.php          # Model de usuários### Página Inicial (Catálogo)

│   ├── produtos.php          # Model de produtos- Grid de produtos

│   └── pedidos.php           # Model de pedidos- Botão "Adicionar ao Carrinho"

├── routes/- Notificação visual ao adicionar produto

│   ├── home.php

│   ├── carrinho.php### Página do Carrinho

│   ├── pedidos.php- Lista de produtos adicionados

│   └── main.php- Controles de quantidade (+/-)

├── view/- Botão remover

│   ├── head.php- Total do carrinho

│   ├── cabecalho.php         # Header com navegação- Botão finalizar pedido

│   ├── home-0.php            # Catálogo de produtos

│   ├── carrinho.php          # Página do carrinho### Página de Pedidos

│   ├── pedidos.php           # Histórico de pedidos- Histórico completo

│   ├── footer.php- Cards com informações detalhadas

│   ├── scripts-top.php- Data, hora e status

│   └── scripts-bottom.php- Total de cada pedido

├── INSTALL_DATABASE.sql      # Script de instalação do banco

├── index.php                 # Entry point## 🎨 Paleta de Cores

└── README.md

```- **Primária**: `rgba(102, 126, 234, 1)` - Azul

- **Secundária**: `rgba(118, 75, 162, 1)` - Roxo

## 🎯 Como Usar- **Sucesso**: `rgba(67, 233, 123, 1)` - Verde

- **Erro**: `rgba(220, 53, 69, 1)` - Vermelho

### Visualizar Produtos

1. Acesse a página inicial (`http://localhost:8000`)## 📝 Observações

2. Veja os 10 produtos disponíveis no catálogo

- O banco de dados WebSQL é inicializado automaticamente

### Adicionar ao Carrinho- 10 produtos são cadastrados automaticamente na primeira execução

1. Clique em "Adicionar ao Carrinho" em qualquer produto- 1 usuário fictício é criado (ID: 1)

2. Observe o badge no menu superior ser atualizado- O carrinho persiste entre sessões via LocalStorage

3. O carrinho é salvo no LocalStorage- Os pedidos são salvos permanentemente no WebSQL



### Gerenciar Carrinho## 👨‍💻 Desenvolvedor

1. Clique em "Carrinho" no menu

2. Aumente/diminua quantidades com os botões +/-Projeto desenvolvido como parte do processo seletivo para Dev JavaScript na Arturia Tech.

3. Remova produtos com o botão "Remover"

4. Veja o total atualizado automaticamente---



### Finalizar Pedido**Data**: Novembro de 2025

1. No carrinho, clique em "Finalizar Pedido"
2. O pedido será salvo no MySQL via PHP
3. Você será redirecionado para "Meus Pedidos"
4. Verá uma mensagem de sucesso com o número do pedido

### Consultar Pedidos
1. Clique em "Meus Pedidos" no menu
2. Veja todos os pedidos realizados
3. Cada pedido mostra: data, produtos, quantidades e total

## 🎨 Padrões de Código

### CSS
- Indentação com TAB
- Variáveis CSS em `:root`
- Unidades VW para responsividade
- Sem propriedades shorthand
- Comentários Start/End

### JavaScript
- Vanilla JavaScript (sem frameworks)
- Padrão de objetos literais
- Callbacks para operações assíncronas
- LocalStorage para persistência do carrinho
- Fetch API para comunicação com backend

### PHP
- Arquitetura MVC
- Padrão de Models baseado em `exemplo.php`
- Arrays associativos para dados
- MySQLi para queries
- Prepared statements em gravações

## 🔧 Troubleshooting

### Erro de Conexão com Banco
- Verifique se o WAMP está rodando
- Confirme que o banco `arturiateste` foi criado
- Verifique as credenciais em `model/conexao-off.php`

### Produtos não aparecem
- Execute o arquivo `INSTALL_DATABASE.sql` completo
- Verifique se as tabelas foram criadas: `SELECT * FROM produtos;`

### Pedido não finaliza
- Abra o Console do navegador (F12)
- Verifique se há erros JavaScript
- Confirme que `controller/salvar_pedido.php` está acessível

## 📝 Licença

Este projeto foi desenvolvido como teste técnico para a Arturia.

## 👨‍💻 Desenvolvedor

Desenvolvido com ❤️ para o teste de Dev JavaScript - Arturia

---

**Data de Entrega**: Conforme solicitado no briefing  
**Contato**: rh@arturia.tech
