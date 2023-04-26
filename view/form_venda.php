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
    <title>Efetuar Vendas</title>
</head>
<body>
  <div id="principal">
    <h2>Efetuar Vendas</h2>
    <form enctype="multipart/form-data" action="../controle/venda.php" method="POST">
      
      <p name="livro">
        <?php
          require_once("../controle/venda.php");
          mostraProdutos();
          ?>
      </p>
      
      <label>Sub total</label>
      <input required type="text" name="precoprevio" id="precoprevio" value=""><br>
    
      <input required type="submit" value="Enviar">
    </form>
  </div>
</body>