# Projeto em Branco

Este é um projeto template/boilerplate que serve como base para iniciar novos projetos web. Contém uma estrutura organizacional padrão e diretrizes de desenvolvimento estabelecidas.

## 🚀 Sobre o Template

Este template foi criado para acelerar o desenvolvimento de novos projetos, fornecendo:
- Estrutura MVC organizada
- Diretrizes de codificação padronizadas
- Arquivos base configurados
- Sistema de rotas básico

## 📁 Estrutura do Projeto

```
projeto-em-branco/
├── index.php              # Ponto de entrada principal
├── controller/             # Controladores e funções
│   ├── components.php
│   ├── funcoes.php
│   └── info.php
├── model/                  # Modelos e dados
│   ├── arrays.php
│   ├── exemplo.php
│   ├── paginas_fixas.php
│   └── paginas.php
├── view/                   # Views e templates
│   ├── 404.php
│   ├── cabecalho.php
│   ├── conteudo.php
│   ├── footer.php
│   ├── head.php
│   ├── home-0.php
│   ├── home-base.php
│   └── scripts-bottom.php
├── routes/                 # Sistema de rotas
│   ├── 404.php
│   ├── conteudo.php
│   ├── css.php
│   ├── home.php
│   └── main.php
├── css/                    # Estilos CSS
│   ├── dinamico.css
│   ├── global.css
│   ├── home-0.css
│   ├── root.css
│   └── scrollbar.css
├── js/                     # Scripts JavaScript
│   ├── motor-bottom.js
│   └── motor-top.js
├── img/                    # Imagens e assets
└── templates/              # Templates e documentação
    └── preferences.md      # Diretrizes de desenvolvimento
```

## 🛠️ Tecnologias

- **PHP** - Backend e lógica do servidor
- **HTML5** - Estrutura semântica
- **CSS3** - Estilização e layout
- **JavaScript** - Interatividade e comportamento

## 📋 Diretrizes de Desenvolvimento

### CSS
- Indentação: sempre TAB
- Layout: foco em Float para layouts simples
- Responsividade: usar VW, evitar VH e PX quando possível
- Cores: usar variáveis CSS em `:root`
- Evitar shorthands genéricos (use propriedades específicas)

### Estrutura de Arquivos
- Cada arquivo deve ter marcadores `/* Start */` e `/* End */`
- Evitar comentários inline em CSS
- Usar includes/require PHP para injetar CSS/JS

### Organização
- Seguir padrão MVC
- Documentação em `templates/preferences.md`
- Manter arquivos `index.html` em pastas para segurança

## 🚀 Como Usar

1. **Clone/copie este template** para um novo projeto
2. **Renomeie a pasta** para o nome do seu projeto
3. **Configure as rotas** em `routes/`
4. **Customize os estilos** em `css/`
5. **Desenvolva as views** em `view/`
6. **Implemente a lógica** em `controller/` e `model/`

## 📝 Configuração Inicial

1. Acesse o arquivo `index.php` para configurar o ponto de entrada
2. Configure as rotas principais em `routes/main.php`
3. Customize as variáveis CSS em `css/root.css`
4. Adapte o layout base em `view/home-base.php`

## 📖 Documentação

Para diretrizes detalhadas de desenvolvimento, consulte:
- `templates/preferences.md` - Padrões e convenções de código
- Comentários nos arquivos base do template

## 🎯 Características

- **MVC organizado** para melhor estruturação
- **Sistema de rotas** flexível
- **CSS responsivo** com variáveis
- **Includes PHP** para otimização
- **Estrutura de segurança** com arquivos index.html

---

**Desenvolvido para acelerar o desenvolvimento de projetos web com padrões consistentes e estrutura organizacional sólida.**
