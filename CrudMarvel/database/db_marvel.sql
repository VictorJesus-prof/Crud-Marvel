CREATE DATABASE db_marvel; 

USE db_marvel;

/* Tabela Tipos */
CREATE TABLE tipos (
	id int AUTO_INCREMENT NOT NULL,
    nome varchar(10) NOT NULL, /* Herói, Vilão, Anti-herói */
    CONSTRAINT pk_tipos PRIMARY KEY (id)
);

/* Tabela Filmes */
CREATE TABLE filmes (
	id int AUTO_INCREMENT NOT NULL,    
    url varchar(2048) NOT NULL, 
    titulo varchar(70) NOT NULL, 
    ano_lancamento int NOT NULL,
    duracao int NOT NULL,
    nota float NOT NULL,    
    CONSTRAINT pk_filmes PRIMARY KEY (id)
);

/* Tabela Personagens */
CREATE TABLE personagens (
	id int AUTO_INCREMENT NOT NULL,
    url varchar(2048) NOT NULL, 
    nome varchar(70) NOT NULL,
    poder varchar(70) NOT NULL,
    id_tipo int NOT NULL,
    id_filme int NOT NULL,
    CONSTRAINT pk_personagens PRIMARY KEY (id)
);

/* Alterar Tabela Personagens */
ALTER TABLE personagens ADD CONSTRAINT fk_tipo FOREIGN KEY (id_tipo) REFERENCES tipos (id);
ALTER TABLE personagens ADD CONSTRAINT fk_filme FOREIGN KEY (id_filme) REFERENCES filmes (id);

/* Insert Tipos */
INSERT INTO tipos (nome) VALUES ('Herói');
INSERT INTO tipos (nome) VALUES ('Anti-Herói');
INSERT INTO tipos (nome) VALUES ('Vilão');
