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
    <title>Cadastro de Autor</title>
</head>
<body>
  <div id="principal">
    <h2>Cadastro de Autor</h2>
    <form enctype="multipart/form-data" action="../controle/autor.php" method="POST">
      <label>Autor: </label>
      <input required type="text" name="autor"><br>
      <input required type="submit" value="Enviar">
    </form>
  </div>
</body>