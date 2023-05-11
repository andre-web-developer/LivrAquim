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
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
        <title> Cadastrar Tema</title>
    </head>
    <body>
        <div id="principal">
            <h2> Cadastro de Tema <h2>
            <form action="../controle/tema.php" method="POST">
                <label>Tema:</label>
                <input type="text" name="tema">
                <input type="submit" name="Enviar">
            </form>
        <div>  
    </body>
</html>