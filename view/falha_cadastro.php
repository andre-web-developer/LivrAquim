<?php
  require_once("../controle/login.php");
  testa_login();
  require("cabecalho.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Falhou</title>
</head>
<body>
  <h1>Cadastro falhou tente novamente</h1>
  <a href="form_livro.php">Tente cadastrar o livro novamente</a>
</body>