Crud-Marvel

Sistema web para cadastro e gerenciamento de personagens e filmes do universo Marvel, desenvolvido como projeto prático durante o curso Técnico em Desenvolvimento de Sistemas (IFPR).

Os dados ficam armazenados no banco de dados e são exibidos dinamicamente em tabelas, com todas as operações de um CRUD e o código organizado em camadas (MVC com DAO e Service).

📋 Funcionalidades
Menu inicial para acessar os cadastros de Personagens e Filmes
Cadastro de personagens com:
Imagem (URL)
Nome
Poder
Tipo (Herói, Anti-Herói ou Vilão)
Filme
Cadastro de filmes com:
Capa (URL)
Título
Ano de lançamento
Duração (em minutos)
Nota
Listagem de personagens e filmes em tabelas
Edição de registros já cadastrados
Exclusão de registros, com confirmação
Relacionamento entre as tabelas: cada personagem pertence a um tipo e a um filme
🛠️ Tecnologias utilizadas
PHP
HTML5
CSS3
Bootstrap 5
MySQL
PDO (conexão com o banco de dados)
🎯 Objetivo do projeto

Este projeto foi desenvolvido como evolução do Crud-Memorias, com o objetivo de aprofundar conceitos fundamentais de desenvolvimento web, incluindo:

Operações completas de CRUD (Create, Read, Update, Delete), agora com edição
Modelagem de banco de dados relacional com chaves estrangeiras (MySQL)
Organização do código em camadas: Model, View, Controller, DAO e Service
Acesso ao banco de dados com PDO
Integração entre back-end (PHP) e front-end (HTML/CSS/Bootstrap)

🚀 Como executar o projeto
Clone este repositório:
git clone https://github.com/VictorJesus-prof/Crud-Marvel.git
Importe o arquivo database/db_marvel.sql no seu servidor MySQL. Ele cria o banco db_marvel, as tabelas e já insere os tipos (Herói, Anti-Herói e Vilão).
Configure as credenciais de conexão com o banco de dados no arquivo util/config.php.
Coloque a pasta do projeto no diretório do seu servidor local (ex: htdocs do XAMPP).
Acesse pelo navegador, por exemplo:
http://localhost/Crud-Marvel/view/include/index.php

Cadastre pelo menos um filme antes de cadastrar personagens, pois cada personagem precisa estar ligado a um filme.

📌 Melhorias futuras
Adicionar autenticação de usuário e controle de sessão
Validar os dados dos formulários
Substituir a listagem em tabelas por cards
Deploy online do projeto
👥 Autores

Projeto desenvolvido em parceria por:

Victor Jesus da Silveira — GitHub
Omar Tehcin el Wanni
