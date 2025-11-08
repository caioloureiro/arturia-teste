# 🎥 Roteiro para Vídeo Explicativo

## 📋 Estrutura Sugerida (8-12 minutos)

### 1. Introdução (1 min)
- Apresentação pessoal
- Objetivo do projeto
- Visão geral das funcionalidades

**Script sugerido**:
> "Olá! Meu nome é [SEU NOME] e este é o projeto de e-commerce desenvolvido para o processo seletivo da Arturia. Neste vídeo vou demonstrar todas as funcionalidades e explicar a lógica utilizada no desenvolvimento."

### 2. Demonstração das Funcionalidades (3-4 min)

#### 2.1 Página Inicial (Catálogo)
- Mostrar grid de produtos
- Destacar informações exibidas (código, descrição, preço)
- Clicar em "Adicionar ao Carrinho"
- Mostrar notificação de sucesso
- Mostrar badge atualizando

#### 2.2 Página do Carrinho
- Navegar para o carrinho
- Mostrar produtos adicionados
- Demonstrar botões +/-
- Demonstrar botão remover
- Mostrar cálculo automático do total
- Finalizar pedido

#### 2.3 Página de Pedidos
- Mostrar mensagem de sucesso
- Exibir histórico de pedidos
- Destacar informações (número, data, status, produtos, total)

#### 2.4 Responsividade
- Abrir DevTools (F12)
- Alternar para modo responsivo
- Mostrar adaptação do layout
- Testar em diferentes tamanhos (mobile, tablet)

### 3. Explicação Técnica (4-5 min)

#### 3.1 Arquitetura do Projeto
Mostrar estrutura de pastas:
```
- controller/
- model/
- view/
- routes/
- css/
- js/
```

**Explicar**:
> "O projeto segue uma arquitetura MVC onde temos a separação clara entre dados (model), visualização (view) e lógica de controle. As rotas gerenciam qual página será exibida."

#### 3.2 Banco de Dados WebSQL
Abrir DevTools > Application > Web SQL

**Mostrar e explicar**:
- Tabela `usuarios` - usuário fictício
- Tabela `produtos` - 10 produtos cadastrados
- Tabela `pedidos` - pedidos realizados
- Tabela `itens_pedido` - itens de cada pedido

**Explicar**:
> "Utilizei WebSQL conforme solicitado no briefing. O banco é criado automaticamente no navegador e persiste os dados localmente."

#### 3.3 Código JavaScript - database.js

Abrir `js/database.js` no editor

**Destacar**:
```javascript
// Inicialização do banco
DB.init()

// Criação das tabelas
criarTabelas()

// População automática
popularProdutos()
```

**Explicar**:
> "O arquivo database.js é responsável por toda a comunicação com o WebSQL. Aqui temos funções para criar o banco, as tabelas e popular com dados iniciais."

#### 3.4 Código JavaScript - carrinho.js

Abrir `js/carrinho.js` no editor

**Destacar**:
```javascript
// Adicionar ao carrinho
Carrinho.adicionar(produto)

// Persistência com LocalStorage
salvarCarrinho()

// Finalizar pedido
Carrinho.finalizar()
```

**Explicar**:
> "O carrinho utiliza LocalStorage para persistir os dados entre sessões. Quando o usuário finaliza a compra, os dados são transferidos para o WebSQL e o carrinho é limpo."

#### 3.5 CSS Responsivo

Abrir `css/ecommerce.css` no editor

**Destacar**:
```css
/* Grid responsivo */
.grid-produtos {
    grid-template-columns: repeat(auto-fill, minmax(18vw, 1fr));
}

/* Media query para mobile */
@media (max-width: 768px) {
    .grid-produtos {
        grid-template-columns: repeat(auto-fill, minmax(45%, 1fr));
    }
}
```

**Explicar**:
> "O CSS utiliza unidades VW para responsividade e media queries para adaptar o layout em diferentes tamanhos de tela. Segui as diretrizes do projeto usando variáveis CSS em :root."

### 4. Diferenciais do Projeto (1-2 min)

**Destacar**:

1. **Código Limpo**
> "Todo o código segue as diretrizes definidas no preferences.md do projeto: indentação com TAB, uso de variáveis CSS, sem comentários inline, marcadores Start/End em todos os arquivos."

2. **JavaScript Vanilla**
> "Optei por não utilizar frameworks como React ou Vue, demonstrando domínio do JavaScript puro."

3. **Persistência Dupla**
> "Implementei persistência em dois níveis: LocalStorage para o carrinho (temporário) e WebSQL para os pedidos (permanente)."

4. **UX/UI**
> "A interface foi pensada para ser intuitiva, com feedback visual através de notificações e badges."

5. **Responsividade**
> "O layout se adapta perfeitamente tanto para desktop quanto para dispositivos móveis."

### 5. Testes Rápidos no Console (1 min)

Abrir Console do navegador (F12 > Console)

**Executar e explicar**:

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

**Explicar**:
> "É possível acessar todas as funções via console para testes e debugging."

### 6. Conclusão (30 seg)

**Script sugerido**:
> "Este projeto demonstra minha capacidade de desenvolver uma aplicação completa, responsiva e funcional, utilizando boas práticas de programação e seguindo as diretrizes estabelecidas. Agradeço a oportunidade e fico à disposição para esclarecer qualquer dúvida. Obrigado!"

---

## 🎬 Dicas de Gravação

### Preparação
- [ ] Feche abas desnecessárias do navegador
- [ ] Configure resolução de tela adequada (1920x1080)
- [ ] Teste o áudio antes de gravar
- [ ] Prepare um roteiro com tópicos principais
- [ ] Tenha o projeto rodando (localhost:8000)

### Durante a Gravação
- [ ] Fale de forma clara e pausada
- [ ] Use o cursor do mouse para destacar pontos importantes
- [ ] Zoom in em códigos quando necessário
- [ ] Grave em um ambiente silencioso
- [ ] Mantenha um ritmo constante (não muito rápido, não muito lento)

### Ferramentas Sugeridas
- **OBS Studio** (gratuito, Windows/Mac/Linux)
- **ShareX** (gratuito, Windows)
- **Loom** (gratuito até 5min, online)
- **Camtasia** (pago, mas muito bom)

### Configurações de Gravação
- Resolução: 1920x1080 (Full HD)
- FPS: 30
- Formato: MP4
- Qualidade: Alta
- Áudio: 44.1kHz, mono ou stereo

---

## 📝 Checklist Pré-Gravação

### Código
- [ ] Projeto funcionando sem erros
- [ ] Banco de dados limpo (resetado)
- [ ] Sem console.log desnecessários
- [ ] Código formatado e organizado

### Navegador
- [ ] Usar Chrome
- [ ] DevTools pronto para uso
- [ ] Zoom 100%
- [ ] Sem extensões visíveis na barra

### Ambiente
- [ ] Editor de código aberto (VS Code recomendado)
- [ ] Terminal pronto (para mostrar `php -S localhost:8000`)
- [ ] Explorador de arquivos em standby
- [ ] Documentação aberta (README.md)

---

## 🎯 Pontos-Chave a Destacar

1. **WebSQL** - Requisito principal
2. **JavaScript Vanilla** - Sem frameworks
3. **Responsividade** - Mobile-first
4. **Persistência** - LocalStorage + WebSQL
5. **Código Limpo** - Diretrizes seguidas
6. **Funcionalidades** - Todas implementadas
7. **UX/UI** - Interface moderna
8. **Documentação** - README completo

---

## 📤 Após a Gravação

### Upload
- [ ] Fazer upload no YouTube (não listado) ou Vimeo
- [ ] Testar o link antes de enviar
- [ ] Verificar qualidade do vídeo
- [ ] Verificar áudio

### E-mail de Entrega
```
Para: rh@arturia.tech
Assunto: Teste Prático Dev JavaScript - [SEU NOME]

Olá!

Segue o resultado do teste prático para a vaga de Dev JavaScript:

🔗 Repositório GitHub: [LINK]
🎥 Vídeo Explicativo: [LINK]

O projeto está completo e funcional, com todas as funcionalidades solicitadas implementadas.

Funcionalidades:
✅ Catálogo de produtos (WebSQL)
✅ Carrinho de compras
✅ Finalização de pedidos
✅ Consulta de histórico
✅ Design responsivo

Tecnologias:
- JavaScript Vanilla
- WebSQL
- PHP
- HTML5/CSS3

Documentação completa disponível no README.md do repositório.

Fico à disposição para esclarecer qualquer dúvida.

Atenciosamente,
[SEU NOME]
[SEU TELEFONE]
[SEU EMAIL]
```

---

**Boa sorte na gravação! 🎬🚀**
