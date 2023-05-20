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
    <link rel="stylesheet" href="../css/linha.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Listagem de Autores</title>
  </head>
  
  <body>
    <div id="listarCentroLivro">
      <div class="text-center my-4">
        <h2>Listagem de Livro</h2>
        <p>Mostra os livros cadastrados em ordem decrescente de estoque.</p>
        <hr class="linha">
      </div>
      <table class="table table-striped">
        <thead class="table-primary">
          <tr>
            <th scope="col" class="text-center">Capa</th>
            <th scope="col" class="text-center">ISBN</th>
            <th scope="col" class="text-center">Título</th>
            <th scope="col" class="text-center">Estoque</th>
            <th scope="col" class="text-center">Autor</th>
            <th scope="col" class="text-center">Editora</th>
            <th scope="col" class="text-center">Tema</th>
            <th scope="col" class="text-center">Alterar</th>
            <th scope="col" class="text-center">Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require("../controle/livro.php");
            listar();
            ?>
        </tbody>
      </table>
    </div>
  </body>
</html>