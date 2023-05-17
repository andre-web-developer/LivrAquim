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
    <title>Relatório Diário</title>
  </head>
  
  <body>
    <div id="listarCentro">
      <div id="listarCentro">
        <form action="form_relatAnual.php" method="post">
          <div class="row mt-3 mb-3">
            <div class="col-md-4 mt-2">
              <label for="ano">Selecione o Ano:</label>
            </div>

            <div class="col-md-4">
              <select name="ano" class="custom-select mr-sm-2">
                  <?php
                    for ($i=date('Y'); $i >= 2018; $i--) { 
                      $ano = date('Y')-$i;
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
              </select>
            </div>

            <div class="col-md-4">
              <input type="submit" value="Gerar Relatório" class="btn btn-primary">
            </div>
          </div>  
        </form>
      </div>

      <div>
        <?php
            if (isset($_POST['ano'])) {
                  require('../controle/relatorio.php');
                  echo "<div class='text-center mt-4 mb-4'><h2>Relatório de $_POST[ano]</h2></div>";
                }
          ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Data</th>
              <th scope="col">Valor Total</th>
              <th scope="col">Forma de pagamento</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($_POST['ano'])) {
                $ano = $_POST['ano'];

                anual($ano);
              }
            ?>    
          </tbody>
        </table> 
      </div>
    </div>
  </body>
</html>