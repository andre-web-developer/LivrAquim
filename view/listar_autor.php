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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/listar.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Listagem de Autores</title>
  </head>
  
  <body>
    <div id="listarCentro">  
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Autor</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require("../controle/autor.php");
            listar();
            ?>
        </tbody>
      </table>
    </div>
  </body>
</html>