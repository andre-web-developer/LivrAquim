<?php
  require_once("../controle/login.php");
  testa_login();
  require_once("cabecalho.php");
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
    <title>Alteração de autor</title>
  </head>

  <body>
    <div id="listarCentro">
      <div class="text-center mt-4 mb-5">
        <h2>Alterar de Autor</h2>
        <p>Prencha os dados conforme deseja fazer a alteração.</p>
      </div>
        <?php
          require_once("../controle/autor.php");
          $id_autor = $_GET['id_autor'];
          $autor = retornaAutor($id_autor);
        ?>
          <form action="../controle/autor.php" method="POST">
            <div class="form-group row text-center">
            <label class="col-sm-3 col-form-label">Autor:</label>
            <div class="col-sm-6">
              <input type="hidden" name="id_autor" value="<?php echo $id_autor; ?>">
              <input type="text" class="form-control" name="nome" value="<?php echo $autor; ?>">
            </div>
            <div class="col-sm-3">
              <input type="submit" name="Enviar" class="btn btn-primary">
            </div>
          </div>
        </form>
    </div>
  </body>