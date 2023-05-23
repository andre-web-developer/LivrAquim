<?php
  require_once("../controle/login.php");
  testa_login();
  require("cabecalho.php"); 
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
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
        <thead class="table-primary text-center">
          <tr>
            <th scope="col">Capa</th>
            <th scope="col">ISBN</th>
            <th scope="col">Título</th>
            <th scope="col">Ano</th>
            <th scope="col">Estoque</th>
            <th scope="col">Preço de venda</th>
            <th scope="col">Preço de custo</th>
            <th scope="col">Autor</th>
            <th scope="col">Editora</th>
            <th scope="col">Tema</th>
            <th scope="col">Alterar</th>
            <th scope="col">Excluir</th>
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