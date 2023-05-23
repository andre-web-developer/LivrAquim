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
    <link rel="stylesheet" href="../css/global.css">
    <title>Alteração de tema</title>
  </head>

  <body>
    <div id="listarCentro">
      <div class="text-center mt-4 mb-5">
        <h2>Alterar de Tema</h2>
        <p>Prencha os dados conforme deseja fazer a alteração.</p>
        <hr class="linha">
      </div>
        <?php
          require_once("../controle/tema.php");
          $id_tema = $_GET['id_tema'];
          $tema = retornaTema($id_tema);
        ?>
        <form action="../controle/tema.php" method="POST">
          <div class="form-group row text-center">
            <label class="col-sm-3 col-form-label">Tema:</label>
            <div class="col-sm-6">
              <input type="hidden" name="id_tema" value="<?php echo $id_tema;?>">
              <input type="text" class="form-control" name="tema" value="<?php echo $tema; ?>">
            </div>
            <div class="col-sm-3">
              <input type="submit" name="Enviar" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
  </body>