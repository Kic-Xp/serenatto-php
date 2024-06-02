# Projeto Serenatto - Sistema de Gerenciamento de Produtos e Geração de PDF

Este é um projeto de desenvolvimento web utilizando PHP, HTML, CSS e JavaScript. O objetivo deste projeto é criar uma interface web para gerenciar (adicionar, editar, visualizar e deletar) produtos de um site fictício chamado "Serenatto", além de gerar um PDF do cardápio da loja.

## Funcionalidades

- **Adicionar Produtos:** Formulário para adicionar novos produtos ao banco de dados.
- **Editar Produtos:** Formulário para editar os detalhes dos produtos existentes, incluindo nome, tipo, descrição, preço e imagem.
- **Deletar Produtos:** Opção para remover produtos do banco de dados.
- **Visualizar Produtos:** Lista de produtos disponíveis com detalhes.
- **Geração de PDF:** Geração de um PDF contendo o cardápio dos produtos disponíveis na loja.

## Tecnologias Utilizadas

- **PHP:** Linguagem de programação utilizada para a lógica de backend.
- **HTML5:** Estruturação do conteúdo web.
- **CSS3:** Estilização da interface do usuário.
- **JavaScript:** Funcionalidades dinâmicas, como máscaras de input.
- **Bootstrap 5:** Framework CSS utilizado para estilização e criação da interface responsiva.
- **DomPDF:** Biblioteca PHP para geração de PDFs.

## Estrutura do Projeto

- `index.php`: Página principal do projeto.
- `admin.php`: Página de administração para listar e gerenciar produtos.
- `edit.php`: Página para editar os detalhes de um produto específico.
- `delete.php`: Página para deletar um produto específico.
- `generate-pdf.php`: Script para gerar o PDF do cardápio.
- `src/Model/Produto.php`: Classe Produto que representa o modelo de dados.
- `src/Repository/ProdutoRepository.php`: Classe ProdutoRepository que gerencia as operações de banco de dados para produtos.
- `src/conexao-bd.php`: Arquivo para configuração da conexão com o banco de dados.
- `assets/`: Diretório contendo imagens e outros recursos utilizados no projeto.
- `css/`: Diretório contendo arquivos CSS para estilização.
- `js/`: Diretório contendo arquivos JavaScript para funcionalidades adicionais.

## Instalação e Configuração

1. Clone o repositório:
   git clone `https://github.com/seu-usuario/projeto-serenatto.git`
2. Navegue até o diretório do projeto:
   `cd projeto-serenatto`
3. Configure a conexão com o banco de dados no arquivo src/conexao-bd.php:
    `<?php
    $pdo = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados', 'usuario', 'senha');
    ?>`
4. Importe o banco de dados (arquivo SQL) para sua instância de banco de dados MySQL.
5. Abra o arquivo `index.php` no seu navegador preferido para visualizar a aplicação.

Agradecimentos Especiais

Gostaria de agradecer à Alura pelo suporte e pelos cursos incríveis que me ajudaram a adquirir as habilidades necessárias para desenvolver este projeto. A plataforma foi fundamental para o meu aprendizado e evolução no desenvolvimento web.
