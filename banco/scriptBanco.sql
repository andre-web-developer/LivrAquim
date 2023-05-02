DROP DATABASE livraria;

CREATE DATABASE livraria;

USE livraria;

CREATE TABLE usuario(
id_usuario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(255),
nome VARCHAR(255),
login VARCHAR(255),
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

INSERT INTO usuario(cpf,nome,login,senha) VALUES("12345678","Gestor","admin","1234");

INSERT INTO editora(nome,cnpj,telefone) VALUES("Novatec","5263969","(42)3231-9652");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Senac","41412525","(42)3231-8888");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Pearson","88524696","(42)3231-7845");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Planeta Gibi","4578545","(42)3231-0000");
INSERT INTO editora(nome,cnpj,telefone) VALUES("Planeta","88885520","(42)3231-1232");

INSERT INTO tema(tema) VALUES("Informática");
INSERT INTO tema(tema) VALUES("Autoajuda");
INSERT INTO tema(tema) VALUES("Romance");
INSERT INTO tema(tema) VALUES("Ficção");
INSERT INTO tema(tema) VALUES("Infantil");

INSERT INTO autor(nome) VALUES ("Andrew Stuart Tanembaum");
INSERT INTO autor(nome) VALUES ("Roger Pressman");
INSERT INTO autor(nome) VALUES ("Ian Somerville");
INSERT INTO autor(nome) VALUES ("Mário Sérgio Cortella");
INSERT INTO autor(nome) VALUES ("Maurício de Souza");
