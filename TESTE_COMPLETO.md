# ✅ CHECKLIST DE TESTE - Sistema Migrado para MySQL

## 📋 Pré-requisitos

- [ ] WAMP64 instalado e rodando (ícone verde)
- [ ] MySQL rodando
- [ ] PHP 7+ disponível

---

## 🗄️ ETAPA 1: Configurar Banco de Dados

### 1.1 Criar Banco
```
1. Abrir phpMyAdmin: http://localhost/phpmyadmin
2. Clicar em "Novo" no menu lateral
3. Nome do banco: arturiateste
4. Collation: utf8mb4_general_ci
5. Clicar em "Criar"
```

### 1.2 Executar SQL
```
1. Selecionar banco "arturiateste" no menu lateral
2. Clicar na aba "SQL"
3. Abrir arquivo: INSTALL_DATABASE.sql
4. Copiar TODO o conteúdo
5. Colar na área de texto do phpMyAdmin
6. Clicar em "Executar"
```

### 1.3 Verificar Instalação
```sql
-- Executar estas queries uma por vez:

SELECT * FROM usuarios;
-- Esperado: 1 linha (Usuário Teste)

SELECT * FROM produtos;
-- Esperado: 10 linhas (PROD001 a PROD010)

SELECT * FROM pedidos;
-- Esperado: 0 linhas (nenhum pedido ainda)

SELECT * FROM itens_pedido;
-- Esperado: 0 linhas (nenhum item ainda)
```

**✅ Se todas as queries funcionarem, o banco está OK!**

---

## 🔧 ETAPA 2: Configurar Conexão

### 2.1 Verificar Senha do MySQL
```
Abrir: model/conexao-off.php

Linha 5: $senha = "caio1234";

Se sua senha for diferente, alterar e salvar.
```

### 2.2 Testar Conexão
```
Criar arquivo: test-conexao.php

<?php
require 'model/conexao.php';
if( $conn->ping() ){
    echo "Conexão OK!";
}else{
    echo "Erro na conexão!";
}
?>

Acessar: http://localhost:8000/test-conexao.php
```

**✅ Se aparecer "Conexão OK!", está funcionando!**

---

## 🚀 ETAPA 3: Iniciar Servidor

### 3.1 Abrir Terminal
```powershell
# Windows PowerShell
cd d:\Sites\arturia-teste
php -S localhost:8000
```

### 3.2 Verificar Servidor
```
Você deve ver:
[Thu Nov 8 10:00:00 2025] PHP 7.x.x Development Server started at http://localhost:8000
```

**✅ Deixar este terminal aberto!**

---

## 🧪 ETAPA 4: Testes Funcionais

### 4.1 Teste: Visualizar Produtos
```
1. Abrir navegador: http://localhost:8000
2. Deve aparecer: "Catálogo de Produtos"
3. Devem aparecer 10 cards de produtos
4. Cada card deve ter:
   - Imagem placeholder
   - Código (PROD001 a PROD010)
   - Nome do produto
   - Preço formatado (R$ X.XXX,XX)
   - Botão "Adicionar ao Carrinho"
```

**✅ Se os 10 produtos aparecerem, PHP + MySQL estão OK!**

### 4.2 Teste: Adicionar ao Carrinho
```
1. Clicar em "Adicionar ao Carrinho" em qualquer produto
2. Deve aparecer notificação: "Produto adicionado ao carrinho!"
3. Badge no menu "Carrinho" deve mostrar: 1
4. Adicionar mais 2 produtos diferentes
5. Badge deve mostrar: 3
```

**✅ Se o badge atualizar, LocalStorage está OK!**

### 4.3 Teste: Visualizar Carrinho
```
1. Clicar em "Carrinho" no menu
2. Devem aparecer os 3 produtos adicionados
3. Cada produto deve mostrar:
   - Imagem
   - Nome
   - Código
   - Preço unitário
   - Quantidade
   - Subtotal
4. Total geral deve estar correto
```

**✅ Se os produtos aparecerem, carrinho está OK!**

### 4.4 Teste: Alterar Quantidades
```
1. No carrinho, clicar no botão "+" de um produto
2. Quantidade deve aumentar: 1 → 2
3. Subtotal deve dobrar
4. Total geral deve aumentar
5. Clicar no botão "-"
6. Quantidade deve diminuir: 2 → 1
7. Valores devem recalcular
```

**✅ Se os cálculos atualizarem, JavaScript está OK!**

### 4.5 Teste: Remover Produto
```
1. Clicar em "Remover" em um produto
2. Produto deve sumir da lista
3. Total deve recalcular
4. Badge no menu deve diminuir
```

**✅ Se remover funcionar, está OK!**

### 4.6 Teste: Finalizar Pedido (CRÍTICO)
```
1. No carrinho, clicar em "Finalizar Pedido"
2. Aguardar 1-2 segundos
3. Deve redirecionar para: /?pagina=pedidos
4. Deve aparecer mensagem verde: "Pedido #1 realizado com sucesso!"
5. Deve aparecer um card com:
   - Número do pedido: Pedido #1
   - Data e hora atual
   - Status: confirmado
   - Lista de produtos
   - Total correto
```

**✅ Se o pedido aparecer, MySQL INSERT está OK!**

### 4.7 Teste: Verificar no Banco
```sql
-- No phpMyAdmin, executar:

SELECT * FROM pedidos;
-- Deve ter 1 linha com id=1

SELECT * FROM itens_pedido;
-- Deve ter 2-3 linhas (um para cada produto)

-- Query completa:
SELECT 
    p.id as pedido_id,
    p.total,
    p.status,
    ip.quantidade,
    pr.descricao,
    pr.preco
FROM pedidos p
INNER JOIN itens_pedido ip ON p.id = ip.pedido_id
INNER JOIN produtos pr ON ip.produto_id = pr.id;
```

**✅ Se aparecerem os dados, persistência está OK!**

### 4.8 Teste: Fazer Segundo Pedido
```
1. Clicar em "Produtos" no menu
2. Adicionar 3 produtos diferentes
3. Ir para Carrinho
4. Finalizar Pedido
5. Deve aparecer: "Pedido #2 realizado com sucesso!"
6. Devem aparecer 2 cards de pedidos
```

**✅ Se aparecerem 2 pedidos, sistema está completo!**

---

## 🎯 ETAPA 5: Teste de Console (Avançado)

### 5.1 Abrir Console do Navegador
```
Pressionar F12
Ir na aba "Console"
```

### 5.2 Testar Carrinho via Console
```javascript
// Ver itens no carrinho
Carrinho.itens

// Ver quantidade total
Carrinho.obterQuantidadeTotal()

// Ver total em reais
Carrinho.obterTotal()
```

### 5.3 Testar API via Console
```javascript
// Simular finalização de pedido
fetch('controller/salvar_pedido.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
        carrinho: [{
            id: 1,
            codigo: 'TESTE',
            descricao: 'Produto Teste',
            preco: 100.00,
            quantidade: 2
        }]
    })
})
.then(r => r.json())
.then(d => console.log(d));

// Deve retornar:
// {sucesso: true, pedido_id: X}
```

**✅ Se retornar sucesso, API REST está OK!**

---

## ❌ Troubleshooting

### Problema: Produtos não aparecem
**Causa**: Banco não instalado ou conexão errada
**Solução**:
1. Verificar se executou `INSTALL_DATABASE.sql`
2. Verificar senha em `model/conexao-off.php`
3. Abrir Console (F12) e ver erros PHP

### Problema: Pedido não finaliza
**Causa**: Erro na API PHP
**Solução**:
1. Abrir: http://localhost:8000/controller/salvar_pedido.php
2. Se der erro 404, verificar caminho do arquivo
3. Ver Console do navegador (F12) → Aba Network
4. Verificar resposta da requisição POST

### Problema: Badge não atualiza
**Causa**: JavaScript não carregado
**Solução**:
1. Verificar se `js/carrinho.js` existe
2. Ver Console (F12) → procurar erros JavaScript
3. Verificar se `view/scripts-top.php` inclui carrinho.js

### Problema: Erro 500
**Causa**: Erro PHP no servidor
**Solução**:
1. Ver terminal onde rodou `php -S localhost:8000`
2. Procurar mensagens de erro
3. Verificar se WAMP está rodando

---

## ✅ CHECKLIST FINAL

Marque cada item após testar:

### Banco de Dados
- [ ] Banco `arturiateste` criado
- [ ] Arquivo `INSTALL_DATABASE.sql` executado
- [ ] 1 usuário inserido
- [ ] 10 produtos inseridos
- [ ] Conexão PHP funcionando

### Frontend
- [ ] 10 produtos aparecem na home
- [ ] Badge do carrinho funciona
- [ ] Adicionar ao carrinho funciona
- [ ] Aumentar/diminuir quantidade funciona
- [ ] Remover produto funciona
- [ ] Total calcula corretamente

### Backend (API)
- [ ] Finalizar pedido funciona
- [ ] Pedido salva no MySQL
- [ ] Itens do pedido salvam no MySQL
- [ ] Redirecionamento funciona
- [ ] Mensagem de sucesso aparece

### Histórico
- [ ] Página "Meus Pedidos" funciona
- [ ] Pedidos carregam do MySQL
- [ ] Detalhes dos pedidos aparecem
- [ ] Data/hora formatada corretamente
- [ ] Total calculado corretamente

---

## 🎉 Sistema Completo!

Se TODOS os checkboxes acima estiverem marcados, o sistema está **100% funcional** e pronto para entrega!

### Próximos Passos:
1. ✅ Fazer commit no Git
2. ✅ Publicar no GitHub
3. ✅ Gravar vídeo explicativo
4. ✅ Enviar para rh@arturia.tech

**Boa sorte! 🚀**
