# 🚀 Guia de Execução - E-commerce Arturia

## ✨ Sistema Completo - MySQL + Responsivo 100%

---

## Pré-requisitos

- WAMP64 (PHP + MySQL + Apache)
- PHP 7.0 ou superior
- MySQL 5.7 ou superior
- Navegador web moderno (qualquer um!)

---

## Como Executar

### Opção 1: Servidor PHP Embutido (Recomendado)

1. Abra o terminal/prompt na pasta do projeto:
```bash
cd d:\Sites\arturia-teste
```

2. Inicie o servidor PHP:
```bash
php -S localhost:8000
```

3. Acesse no navegador:
```
http://localhost:8000
```

### Opção 2: XAMPP/WAMP

1. Copie a pasta do projeto para `htdocs` (XAMPP) ou `www` (WAMP)

2. Inicie Apache e MySQL

3. Acesse no navegador:
```
http://localhost/arturia-teste
```

---

## Configuração do Banco de Dados

### 1. Criar o Banco
1. Abra phpMyAdmin: `http://localhost/phpmyadmin`
2. Clique em "Novo" para criar banco
3. Nome: `arturiateste`
4. Codificação: `utf8mb4_unicode_ci`
5. Clique em "Criar"

### 2. Instalar as Tabelas
1. Abra a aba SQL do banco `arturiateste`
2. Copie e cole todo conteúdo de `INSTALL_DATABASE.sql`
3. Clique em "Executar"
4. Pronto! Banco criado com dados iniciais

### 3. Verificar Instalação
Execute no phpMyAdmin:
```sql
SELECT COUNT(*) FROM usuarios;   -- Deve ser 1
SELECT COUNT(*) FROM produtos;   -- Deve ser 10
SELECT COUNT(*) FROM pedidos;    -- Deve ser 0
```

---

## Testando a Aplicação

### 📱 Desktop

1. **Página Inicial (Catálogo)**
   - Veja os 10 produtos
   - Clique em "Adicionar ao Carrinho"
   - Badge do carrinho atualiza
   - Notificação verde aparece

2. **Página do Carrinho**
   - Clique em "Carrinho" no menu
   - Veja produtos adicionados
   - Use **+** e **-** para ajustar quantidades
   - Clique "Remover" para tirar itens
   - Total recalcula automaticamente
   - Clique "Finalizar Pedido"

3. **Página de Pedidos**
   - Mensagem de sucesso no topo
   - Veja histórico de pedidos
   - Detalhes completos de cada pedido
   - Data, hora, produtos e total

---

### 📱 Mobile (100% Responsivo)

1. **Abrir DevTools**
   - Pressione **F12** no navegador
   - Clique no ícone de dispositivo (canto superior esquerdo)
   - Selecione um aparelho (iPhone, iPad, Android)

2. **Testar Responsividade**
   - ✅ Navegação em 100% width
   - ✅ Produtos ocupam tela inteira
   - ✅ Botões expandidos e clicáveis
   - ✅ Textos legíveis
   - ✅ Sem scroll horizontal

3. **Testar Funcionalidades**
   - Adicione produtos ao carrinho
   - Vá para o carrinho
   - Finalize pedidos
   - Veja histórico

---

## Verificando o Banco de Dados

### phpMyAdmin

1. Abra: `http://localhost/phpmyadmin`
2. Selecione banco `arturiateste`
3. Veja as 4 tabelas:
   - `usuarios` - Usuário fictício
   - `produtos` - 10 produtos
   - `pedidos` - Seus pedidos criados
   - `itens_pedido` - Itens de cada pedido

### Após Finalizar um Pedido

Execute no phpMyAdmin:
```sql
SELECT * FROM pedidos WHERE id = [seu_pedido_id];
SELECT * FROM itens_pedido WHERE pedido_id = [seu_pedido_id];
```

---

## Funcionalidades para Testar

### ✅ Catálogo
- [x] Ver lista de 10 produtos
- [x] Produtos carregam do MySQL
- [x] Código, descrição e preço visíveis
- [x] Imagem em cada produto

### ✅ Carrinho
- [x] Adicionar produtos
- [x] Badge atualiza em tempo real
- [x] Aumentar/diminuir quantidade
- [x] Remover produtos
- [x] Total recalculado automaticamente
- [x] Carrinho persiste no LocalStorage

### ✅ Pedidos
- [x] Finalizar pedido com sucesso
- [x] Pedido salvo no MySQL
- [x] Ver histórico de pedidos
- [x] Ver detalhes completos
- [x] Data e hora corretas
- [x] Total correto

### ✅ Responsividade 100%
- [x] Desktop: layout normal
- [x] Tablet: produtos 1 por linha
- [x] Mobile: nav e botões 100% width
- [x] Sem scroll horizontal
- [x] Todos elementos legíveis

---

## URLs da Aplicação

```
http://localhost:8000/                      # Home (catálogo)
http://localhost:8000/?pagina=carrinho      # Carrinho
http://localhost:8000/?pagina=pedidos       # Meus pedidos
```

---

## Problemas Comuns

### Erro: "Não consegue conectar ao banco"
```
Solução:
1. Verifique se WAMP/XAMPP está rodando
2. Verifique se MySQL está ativo
3. Confira credenciais em model/conexao-off.php
4. Verifique porta MySQL (padrão: 3306)
```

### Erro: "Banco não encontrado"
```
Solução:
1. Crie o banco no phpMyAdmin
2. Execute INSTALL_DATABASE.sql
3. Recarga a página (F5)
```

### Produtos não aparecem
```
Solução:
1. Verifique se INSTALL_DATABASE.sql foi executado
2. Execute no phpMyAdmin: SELECT * FROM produtos;
3. Deve retornar 10 linhas
```

### Pedido não finaliza
```
Solução:
1. Abra DevTools (F12)
2. Vá para aba Console
3. Veja se há erros JavaScript
4. Verifique resposta da API em Network
```

### Responsivo não funciona no mobile
```
Solução:
1. Teste em DevTools primeiro (F12 > Device Mode)
2. Se funcionar em DevTools, é responsivo
3. Limpe cache do navegador (Ctrl+Shift+Delete)
4. Teste em outro navegador
```

---

## Dicas Úteis

### 1. DevTools (F12)
- **Console**: Veja erros de JavaScript
- **Network**: Veja requisições HTTP
- **Application**: Veja LocalStorage
- **Responsive**: Teste em diferentes tamanhos

### 2. Limpar Cache
```
Chrome: Ctrl + Shift + Delete
Firefox: Ctrl + Shift + Delete
Safari: Cmd + Option + E
```

### 3. Ver Console do Servidor
Deixe o terminal aberto enquanto testa:
```bash
php -S localhost:8000
```

Você verá todas as requisições HTTP.

---

## Estrutura de Dados - Fluxo Completo

```
1. PRODUTO
   - Carregado do MySQL (home.php)
   - Mostrado em grid responsivo
   - Clique adiciona ao LocalStorage

2. CARRINHO (LocalStorage)
   - Itens temporários no navegador
   - Persiste entre páginas
   - Pronto para finalizar

3. PEDIDO
   - Enviado via Fetch API
   - Recebido por salvar_pedido.php
   - Inserido em MySQL
   - Retorna ID do pedido

4. PEDIDO (MySQL)
   - Persistente no servidor
   - Pode consultar a qualquer momento
   - Nunca é perdido
```

---

## Responsividade - Breakpoints

```
Desktop (> 1024px)
├── Nav horizontal em linha
├── Produtos em grid (3-4 colunas)
├── Botões normais

Mobile (≤ 1024px)
├── Nav vertical 100% width
├── Produtos 1 por linha (100%)
├── Botões expandidos 100%
├── Font size aumentado
├── Padding aumentado
└── Tudo legível sem zoom
```

---

## ✅ Tudo Pronto!

O sistema está **100% funcional** e **100% responsivo**.

**Próximos passos**:
1. Testar todas as funcionalidades
2. Verificar responsividade em mobile
3. Validar dados no MySQL
4. Publicar no GitHub
5. Enviar link para rh@arturia.tech

---

**Desenvolvido com ❤️ para a Arturia Tech**

**Data**: Novembro 2025
