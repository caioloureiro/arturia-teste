# 🚀 Guia de Execução - E-commerce Arturia

## Pré-requisitos

- PHP 7.0 ou superior
- Navegador web compatível com WebSQL:
  - ✅ Google Chrome (recomendado)
  - ✅ Safari
  - ✅ Opera
  - ⚠️ Não use Firefox (WebSQL descontinuado)

## Como Executar

### Opção 1: Servidor PHP Embutido

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

2. Inicie o Apache

3. Acesse no navegador:
```
http://localhost/arturia-teste
```

## Testando a Aplicação

### 1. Página Inicial (Catálogo)
- Você verá 10 produtos cadastrados automaticamente
- Clique em "Adicionar ao Carrinho" em qualquer produto
- Uma notificação verde aparecerá
- O badge do carrinho no header será atualizado

### 2. Página do Carrinho
- Clique em "Carrinho" no menu
- Você verá os produtos adicionados
- Use os botões **+** e **-** para alterar quantidades
- Clique em "Remover" para tirar produtos
- O total é calculado automaticamente
- Clique em "Finalizar Pedido"

### 3. Página de Pedidos
- Após finalizar, você será redirecionado para "Meus Pedidos"
- Uma mensagem de sucesso aparecerá no topo
- Você verá o histórico completo de pedidos
- Cada pedido mostra:
  - Número do pedido
  - Data e hora
  - Status
  - Produtos comprados
  - Total

## Verificando o Banco de Dados

### Chrome DevTools

1. Pressione **F12** para abrir DevTools
2. Vá na aba **Application**
3. No menu lateral, expanda **Web SQL**
4. Clique em **EcommerceDB**
5. Você verá as tabelas:
   - `usuarios` - Usuário fictício
   - `produtos` - 10 produtos
   - `pedidos` - Seus pedidos
   - `itens_pedido` - Itens de cada pedido

### Console do Navegador

Execute no console para ver dados:

```javascript
// Ver todos os produtos
DB.buscarProdutos(function(produtos) {
    console.table(produtos);
});

// Ver todos os pedidos
DB.buscarPedidos(function(pedidos) {
    console.log(pedidos);
});

// Ver itens do carrinho
console.log(Carrinho.itens);
```

## Resetar o Banco de Dados

Se quiser começar do zero:

```javascript
// No console do navegador
indexedDB.deleteDatabase('EcommerceDB');
localStorage.clear();
// Depois recarregue a página (F5)
```

## Funcionalidades para Testar

### ✅ Catálogo
- [x] Ver lista de produtos
- [x] Adicionar produto ao carrinho
- [x] Ver notificação de sucesso
- [x] Badge do carrinho atualizar

### ✅ Carrinho
- [x] Ver produtos adicionados
- [x] Aumentar quantidade
- [x] Diminuir quantidade
- [x] Remover produto
- [x] Ver total calculado
- [x] Finalizar pedido

### ✅ Pedidos
- [x] Ver mensagem de sucesso
- [x] Ver lista de pedidos
- [x] Ver detalhes de cada pedido
- [x] Ver data/hora do pedido
- [x] Ver total do pedido

### ✅ Responsividade
- [x] Testar no desktop
- [x] Testar no mobile (F12 > Toggle device toolbar)
- [x] Menu adapta para mobile
- [x] Grid de produtos adapta
- [x] Carrinho adapta

## Problemas Comuns

### "Erro ao inicializar banco"
- **Solução**: Use Google Chrome ou Safari

### Produtos não aparecem
- **Solução**: Aguarde 1-2 segundos, o banco está sendo criado
- Recarregue a página (F5)

### Badge do carrinho não atualiza
- **Solução**: Espere 0.5 segundos após a página carregar
- O JavaScript precisa inicializar

### Pedido não finaliza
- **Solução**: Verifique o console do navegador (F12)
- Pode haver erro de JavaScript

## Dicas

1. **Abra sempre o DevTools** (F12) para ver o que está acontecendo
2. **Use Chrome** para melhor compatibilidade
3. **Limpe o cache** se algo não funcionar (Ctrl+Shift+Delete)
4. **Veja o console** para mensagens de erro ou sucesso

## Estrutura de URLs

- `http://localhost:8000/` - Página inicial (catálogo)
- `http://localhost:8000/?pagina=carrinho` - Carrinho
- `http://localhost:8000/?pagina=pedidos` - Meus pedidos

---

## 📹 Vídeo Explicativo

Para ver a explicação completa do código e lógica implementada, assista ao vídeo explicativo incluído na entrega.

---

**Desenvolvido por**: [Seu Nome]
**Data**: Novembro 2025
**Contato**: [Seu Email]
