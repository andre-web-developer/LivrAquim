DROP DATABASE livraria;

CREATE DATABASE livraria;

USE livraria;

CREATE TABLE usuario(
id_usuario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(255),
nome VARCHAR(255),
email VARCHAR(255),
senha VARCHAR(255));

CREATE TABLE editora(
id_editora INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
cnpj VARCHAR(255),
telefone VARCHAR(255));

CREATE TABLE tema(
id_tema INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
tema VARCHAR(255));

CREATE TABLE autor(
id_autor INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255));

CREATE TABLE livro(
id_livro INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
isbn VARCHAR(255),
titulo VARCHAR(255),
ano INTEGER,
quantidade INTEGER,
precovenda DECIMAL(10,2),
precocompra DECIMAL(10,2),
foto VARCHAR(255),
id_editora INTEGER,
id_tema INTEGER,
id_autor INTEGER,
FOREIGN KEY(id_editora) REFERENCES editora(id_editora),
FOREIGN KEY(id_tema) REFERENCES tema(id_tema),
FOREIGN KEY(id_autor) REFERENCES autor(id_autor));

CREATE TABLE formapagamento(
id_formapagamento INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
formapagamento VARCHAR(255),
descontoporcento INTEGER);

CREATE TABLE venda(
id_venda INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
data DATE,
valortotal DECIMAL(10,2),
id_formapagamento INTEGER,
FOREIGN KEY(id_formapagamento) REFERENCES formapagamento(id_formapagamento));

CREATE TABLE venda_livro(
id_venda_livro INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
id_venda INTEGER,
id_livro INTEGER,
quantidade_venda INTEGER,
valorunitario DECIMAL(10,2),
FOREIGN KEY(id_venda) REFERENCES venda(id_venda),
FOREIGN KEY(id_livro) REFERENCES livro(id_livro));

INSERT INTO usuario(cpf,nome,senha,email) VALUES("11111111111","Administrador","123","andrerodrigues2003@gmail.com");
INSERT INTO usuario(cpf,nome,senha,email) VALUES ("22222222222","Joaquim","123","andrerodrigues2003@gmail.com");

INSERT INTO editora(nome,cnpj,telefone) VALUES("Novatec","5263969","(42)3231-9652");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Senac","41412525","(42)3231-8888");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Pearson","88524696","(42)3231-7845");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Planeta Gibi","4578545","(42)3231-0000");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Planeta","88885520","(42)3231-1232");

INSERT INTO tema(tema) VALUES("Informática");
INSERT INTO tema(tema) VALUES("Auto-ajuda");
INSERT INTO tema(tema) VALUES("Romance");
INSERT INTO tema(tema) VALUES("Ficção");
INSERT INTO tema(tema) VALUES("Infantil");

INSERT INTO autor(nome) VALUES ("Andrew Stuart Tanembaum");
INSERT INTO autor(nome) VALUES ("Roger Pressman");
INSERT INTO autor(nome) VALUES ("Ian Somerville");
INSERT INTO autor(nome) VALUES ("Mário Sérgio Cortella");
INSERT INTO autor(nome) VALUES ("Maurício de Souza");
INSERT INTO autor(nome) VALUES ("Maurício Samy Silva");
INSERT INTO autor(nome) VALUES ("Loiane Gruner");

INSERT INTO formapagamento(formapagamento,descontoporcento) VALUES ("Dinheiro", 5);
INSERT INTO formapagamento(formapagamento,descontoporcento) VALUES ("PIX", 5);
INSERT INTO formapagamento(formapagamento,descontoporcento) VALUES ("Cartão", 5);

INSERT INTO livro(isbn,titulo,ano,id_autor,id_tema,id_editora,precocompra,precovenda,quantidade,foto) VALUES ('8575222481','JavaScript - Guia do Programador: Guia Completo das Funcionalidades de Linguagem JavaScript','2010','6','1','1','94.41','124.99','50','../img/capas/capa-ampliada-9788575222485.jpg');
INSERT INTO livro(isbn,titulo,ano,id_autor,id_tema,id_editora,precocompra,precovenda,quantidade,foto) VALUES ('8575226932','Estruturas de Dados e Algoritmos com JavaScript: Escreva um Código JavaScript Complexo e Eficaz Usando a Mais Recente ECMAScript','2019','7','1','1','92.70','119..90','50','../img/capas/js-book.jpg');

INSERT INTO venda(id_formapagamento,data,valortotal) VALUES ('1','2023-05-25','118.74');
INSERT INTO venda(id_formapagamento,data,valortotal) VALUES ('3','2023-05-25','356.22');

INSERT INTO venda_livro(id_livro,id_venda,quantidade_venda,valorunitario) VALUES ('1','1','1','124.99');
INSERT INTO venda_livro(id_livro,id_venda,quantidade_venda,valorunitario) VALUES ('1','2','3','124.99');
