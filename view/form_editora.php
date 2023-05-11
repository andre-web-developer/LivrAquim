<?php
require_once("../controle/login.php");
testa_login();
require("cabecalho.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Cadastrar Editora</title>
</head>
<body>
<div id="principal">
    <h2> Cadastro de Editora <h2>
        <form action="../controle/editora.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="nome">
            

            <label>CNPJ:</label>
            <input type="text" name="cnpj">
           

            <label>Telefone:</label>
            <input type="text" name="telefone">
            <input type="submit" name="Enviar">
        </form>
    
    </div>
    
</body>
</html>