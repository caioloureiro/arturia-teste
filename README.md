# E-commerce - Teste Prático Arturia

## 📋 Descrição do Projeto

Aplicação web de e-commerce desenvolvida para o processo seletivo de Dev JavaScript da Arturia. A aplicação permite que usuários visualizem produtos, adicionem ao carrinho e finalizem compras, além de consultar o histórico de pedidos.

## 🚀 Tecnologias Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7+
- **Banco de Dados**: WebSQL (navegador)
- **Arquitetura**: MVC Simplificado

## ✨ Funcionalidades

### ✅ Implementadas

1. **Catálogo de Produtos**
   - Listagem de produtos com código, descrição, preço e imagem
   - Layout em grid responsivo
   - Produtos armazenados no WebSQL

2. **Carrinho de Compras**
   - Adicionar produtos ao carrinho
   - Aumentar/diminuir quantidade
   - Remover produtos
   - Cálculo automático do total
   - Badge com quantidade de itens
   - Persistência via LocalStorage

3. **Finalização de Pedido**
   - Salvar pedido no WebSQL
   - Gerar número do pedido
   - Limpar carrinho após finalização
   - Mensagem de sucesso

4. **Consulta de Pedidos**
   - Listagem de todos os pedidos
   - Detalhes de cada pedido (produtos, quantidades, valores)
   - Data e hora do pedido
   - Status do pedido

5. **Design Responsivo**
   - Layout adaptável para desktop e mobile
   - Media queries para diferentes tamanhos de tela
   - Interface moderna e intuitiva

## 🗄️ Estrutura do Banco de Dados (WebSQL)

### Tabela: usuarios
- id (INTEGER PRIMARY KEY)
- nome (TEXT)
- email (TEXT)
- created_at (DATETIME)

### Tabela: produtos
- id (INTEGER PRIMARY KEY)
- codigo (TEXT)
- descricao (TEXT)
- preco (REAL)
- imagem (TEXT)

### Tabela: pedidos
- id (INTEGER PRIMARY KEY AUTOINCREMENT)
- usuario_id (INTEGER)
- total (REAL)
- status (TEXT)
- created_at (DATETIME)

### Tabela: itens_pedido
- id (INTEGER PRIMARY KEY AUTOINCREMENT)
- pedido_id (INTEGER)
- produto_id (INTEGER)
- quantidade (INTEGER)
- preco_unitario (REAL)

## 📁 Estrutura de Arquivos

```
arturia-teste/
├── controller/          # Lógica de controle
├── model/              # Models e arrays de dados
│   └── paginas_fixas.php
├── routes/             # Rotas da aplicação
│   ├── home.php
│   ├── carrinho.php
│   └── pedidos.php
├── view/               # Views/Templates
│   ├── cabecalho.php
│   ├── home-0.php
│   ├── carrinho.php
│   └── pedidos.php
├── css/                # Estilos
│   ├── root.css        # Variáveis CSS
│   └── ecommerce.css   # Estilos do e-commerce
├── js/                 # JavaScript
│   ├── database.js     # Gerenciamento WebSQL
│   ├── carrinho.js     # Lógica do carrinho
│   └── app.js          # Funcionalidades gerais
├── index.php           # Arquivo principal
└── README.md           # Documentação
```

## 🎨 Diretrizes de Código

O projeto segue as diretrizes definidas em `templates/preferences.md`:

- Indentação: **TAB**
- Layout: **Float** para estruturas simples
- CSS: Uso de **VW** para responsividade (nunca 100vw, sempre 100%)
- Cores: Variáveis CSS em `:root`
- Propriedades específicas (não shorthands)
- Marcadores Start/End em cada arquivo

## 🔧 Como Executar

1. **Requisitos**:
   - Servidor web com PHP 7+
   - Navegador compatível com WebSQL (Chrome ou Safari)

2. **Instalação**:
   ```bash
   # Clone o repositório
   git clone [URL_DO_REPOSITORIO]
   
   # Navegue até a pasta
   cd arturia-teste
   
   # Inicie um servidor PHP local
   php -S localhost:8000
   ```

3. **Acesso**:
   - Abra o navegador em: `http://localhost:8000`

## 📱 Compatibilidade

- ✅ Google Chrome
- ✅ Safari
- ✅ Opera
- ⚠️ Firefox (WebSQL descontinuado, usar Chrome ou Safari)
- ⚠️ Edge (usar Chrome)

## 🎯 Funcionalidades Principais

### Página Inicial (Catálogo)
- Grid de produtos
- Botão "Adicionar ao Carrinho"
- Notificação visual ao adicionar produto

### Página do Carrinho
- Lista de produtos adicionados
- Controles de quantidade (+/-)
- Botão remover
- Total do carrinho
- Botão finalizar pedido

### Página de Pedidos
- Histórico completo
- Cards com informações detalhadas
- Data, hora e status
- Total de cada pedido

## 🎨 Paleta de Cores

- **Primária**: `rgba(102, 126, 234, 1)` - Azul
- **Secundária**: `rgba(118, 75, 162, 1)` - Roxo
- **Sucesso**: `rgba(67, 233, 123, 1)` - Verde
- **Erro**: `rgba(220, 53, 69, 1)` - Vermelho

## 📝 Observações

- O banco de dados WebSQL é inicializado automaticamente
- 10 produtos são cadastrados automaticamente na primeira execução
- 1 usuário fictício é criado (ID: 1)
- O carrinho persiste entre sessões via LocalStorage
- Os pedidos são salvos permanentemente no WebSQL

## 👨‍💻 Desenvolvedor

Projeto desenvolvido como parte do processo seletivo para Dev JavaScript na Arturia Tech.

---

**Data**: Novembro de 2025
