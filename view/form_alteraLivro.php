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
    <link rel="stylesheet" href="../css/linha.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Alteração de Livro</title>
  </head>

  <body>
    <div id="listarCentro">
      <div class="text-center mt-4 mb-5">
        <h2>Alterar de Livro</h2>
        <p>Prencha os dados conforme deseja fazer a alteração.</p>
        <hr class="linha">
      </div>
        <?php
          require_once("../controle/livro.php");
          $id_livro = $_GET['id_livro'];
          $livro = retornaLivro($id_livro);
        ?>
          <form enctype="multipart/form-data" action="../controle/livro.php" method="POST">
            <div class="form-group">
              <div class="form-group">
                <label><h6>Foto da capa:</h6></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fotolivro" name="foto">
                    <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                </div>
                <div class="text-center mt-4"  id="img">
                    <img id="preview" width="150px" height="200px" src="<?php echo "../$livro[foto]";?>"> 
                </div>
              </div>
              <input type="hidden" name="id_livro" value="<?php echo $id_livro;?>">
              <label class="col-sm-3 col-form-label">ISBN:</label>
              <input type="text" class="form-control" name="isbn" value="<?php echo $livro['isbn']; ?>">
              <label class="col-sm-3 col-form-label">Livro:</label>
              <input type="text" class="form-control" name="titulo" value="<?php echo $livro['titulo']; ?>">
              <label class="col-sm-3 col-form-label">Ano:</label>
              <input type="number" class="form-control" name="ano" value="<?php echo $livro['ano']; ?>">
              <label class="col-sm-3 col-form-label">Quantidade:</label>
              <input type="number" class="form-control" name="quantidade" value="<?php echo $livro['quantidade']; ?>">
              <label class="col-sm-3 col-form-label">Preço de venda:</label>
              <input type="number" class="form-control" name="precovenda" value="<?php echo $livro['precovenda']; ?>">
              <label class="col-sm-3 col-form-label">Preço de custo:</label>
              <input type="number" class="form-control" name="precocompra" value="<?php echo $livro['precocompra']; ?>">
              
              <input type="submit" name="Enviar" class="btn btn-primary">
            </div>
        </form>
    </div>
  </body>