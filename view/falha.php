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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <title>Falha na <?php echo $funcao?></title>
  </head>
  <body>
    <div class="text-center mt-5 mb-4">
      <?php
        switch ($funcao) {
          case 'Exclusão':
            echo "<h2>$funcao não efetuada!</h2>
                  <p>$funcao falhou, possívelmente por dependencia nos dados, caso possível considere apenas altera-los, ou entre em contato com o administrador do sistema.</p>
                  <hr class='linha'>
                  <a href='listar_$pagina.php'><button type='submit' class='btn btn-primary mr-2 mt-5'>Tente novamente</button></a>
                  <a href='bem_vindo.php'><button type='submit' class='btn btn-primary ml-2 mt-5'>Volte ao inicio</button></a>";
            break;
          
          case 'Atualização':
            echo "<h2>$funcao não efetuada!</h2>
                  <p>$funcao falhou, verifique se prencheu os dados corretamente e tente novamente, caso o erro perssistir entre em contato com o administrador do sistema.</p>
                  <hr class='linha'>
                  <a href='listar_$pagina.php'><button type='submit' class='btn btn-primary mr-2 mt-5'>Tente novamente</button></a>
                  <a href='bem_vindo.php'><button type='submit' class='btn btn-primary ml-2 mt-5'>Volte ao inicio</button></a>";
            break;
          
          default:
            echo "<h2>$funcao não efetuado!</h2>
                  <p>$funcao falhou, verifique se prencheu os dados corretamente e tente novamente, caso o erro perssistir entre em contato com o administrador do sistema.</p>
                  <hr class='linha'>
                  <a href='form_$pagina.php'><button type='submit' class='btn btn-primary mr-2 mt-5'>Tente novamente</button></a>
                  <a href='bem_vindo.php'><button type='submit' class='btn btn-primary ml-2 mt-5'>Volte ao inicio</button></a>";
            break;
        }
      ?>
    </div>
  </body>
</html>