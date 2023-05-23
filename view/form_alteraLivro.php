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
          <input type="hidden" name="id_livro" value="<?php echo $id_livro;?>">
          <label><h6>Foto da capa:</h6></label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="fotolivro" name="foto">
              <label class="custom-file-label" for="customFile">Escolher arquivo</label>
            </div>
            <div class="text-center mt-4">
              <img id="preview" width="150px" height="200px" src="<?php echo $livro['foto'];?>"> 
            </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label><h6>ISBN:</h6></label>
            <input type="text" name="isbn" class="form-control" value="<?php echo $livro['isbn']; ?>">
          </div>

          <div class="form-group col-md-6">
            <label><h6>Título:</h6></label>
            <input type="text" name="titulo" class="form-control" value="<?php echo $livro['titulo']; ?>">
          </div>

          <div class="form-group col-md-2">
            <label><h6>Quantidade:</h6></label>
            <input type="number" name="quantidade" class="form-control" value="<?php echo $livro['quantidade']; ?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-7">
            <label><h6>Autor:</h6></label>
            <select class="form-control" name="id_autor">
              <?php
                mostrarAutor();
              ?>
            </select>
          </div>

          <div class="form-group col-md-5">
            <label class="form-label"><h6>Ano:</h6></label>
            <select class="form-control" name="ano">
              <?php
                for ($i=date('Y'); $i >= 1950; $i--) { 
                  if($i==$livro['ano']){
                    echo "<option selected value=$i>$i</option>";
                  }else{
                    echo "<option value=$i>$i</option>";
                  }
                }
              ?>
            </select>                
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-5">
            <label><h6>Editora:</h6></label>
            <select class="form-control" name="id_editora">
              <?php
                mostrarEditoras();
              ?>
            </select>
          </div>

          <div class="form-group col-md-7">
              <label><h6>Tema:</h6></label>
              <select class="form-control" name="id_tema">
              </select>
          </div>
        </div>
                <?php
                  mostrarTemas();
                ?>
            
        <div class="form-group row">
          <label class="col-sm-3 col-form-label"><h6>Preço de Custo</h6></label>
          <div class="col-sm-9">
            <div class="form-group row">
              <label class="col-sm col-form-label"><h6>R$</h6></label>
              <div class="col-sm-11">
                <input type="text" name="precocompra" class="form-control" value="<?php echo $livro['precocompra']; ?>" placeholder="Ex: 10.00">
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-3 col-form-label"><h6>Preço de Venda</h6></label>
          <div class="col-sm-9">
            <div class="form-group row">
              <label class="col-sm col-form-label "><h6>R$</h6></label>
              <div class="col-sm-11">
                <input type="text" name="precovenda" class="form-control" value="<?php echo $livro['precovenda']; ?>" placeholder="Ex: 100.00">
              </div>
            </div>
          </div>
          <input type="submit" value="Alterar" class="btn btn-primary m-auto">
        </div>
      </form>
    </div>
    <script type="text/javascript">
      function readImage(){
        if (this.files && this.files[0]){
          var file = new FileReader();
          file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
          };       
          file.readAsDataURL(this.files[0]);
          document.getElementById("img").style.display = "block";
        }
      }

      document.getElementById("fotolivro").addEventListener("change", readImage, false);
    </script>
  </body>