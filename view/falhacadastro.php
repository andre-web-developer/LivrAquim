<?php
    require_once("../controle/login.php");
    testa_login();
    require("cabecalho.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro efetuado!</title>
</head>
<body>
    <div id="principal">
        <h3>Falha no Cadastro. Tente novamente!</h3>
        <a href="form_livro.php"> Cadastrar Livro </a><br>
        <a href="#"> Cadastrar Tema </a><br>
        <a href="#"> Cadastrar Autor </a><br>
        <a href="#"> Cadastrar Editora </a><br>
</body>
</html>