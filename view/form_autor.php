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
    <title>Cadastrar Autor</title>
</head>
<body>
<div id="principal">
    <h2> Cadastro de Autor <h2>
        <form action="../controle/autor.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="nome">
            <input type="submit" name="Enviar">

            
    
</body>
</html>