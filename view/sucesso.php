<?php
  require_once("../controle/login.php");
  testa_login();
  require("cabecalho.php");
  $pagina = $_GET['pagina'];
  $funcao = $_GET['funcao'];
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/global.css">
      <title>Sucesso <?php echo $funcao?></title>
  </head>
  <body>
      <div class="text-center mt-5 mb-4">
          <?php
            switch ($funcao) {
            case 'Venda':
              echo "<h2>$funcao bem sucedida!</h2>
                    <p>$funcao realizada sem nenhum problema, para onde deseja ir agora?</p>";
              break;
            
            default:
              echo "<h2>$funcao bem sucedido!</h2>
                    <p>$funcao realizado sem nenhum problema, para onde deseja ir agora?</p>";
              break;
            }
          ?>
          <hr class="linha">
          <a href="form_<?php echo $pagina.".php"; ?>"><button type="submit" class="btn btn-primary mr-2 mt-5">Continuar <?php echo strtolower($funcao)?></button></a>
          <a href="bem_vindo.php"><button type="submit" class="btn btn-primary ml-2 mt-5">Volte ao inicio</button></a>
      </div>
  </body>
</html>