<?php
    require_once("../controle/login.php");
    testa_login();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro de Livro</title>
    <style>
        #img{
            display:none;
        }
    </style>
</head>
<body>
    <?php
        require("cabecalho.php");
    ?>
    <div id="principal">
        <h2>Cadastro de Livro</h2>
        <form enctype="multipart/form-data" action="../controle/livro.php" method="POST">
        Escolha uma foto da capa: <input type="file" id="fotolivro" name="foto" multiple class="form-control ">
                        <div id="img" class="mb-2 d-flex justify-content-center">
                            <img id="preview" width="150px" height="150px" src="" > 
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
        </div>
        <div class="clearfix"></div>
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>ISBN: </label>
                        <input type="text" name="isbn" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Título: </label>
                        <input type="text" name="titulo" class="form-control">
                    </div>
                </div>

                <label>Ano: </label>
                <select class="form-control" name="ano">
                    <?php
                    for ($i=2023; $i>=1950; $i--) { 
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <label>Autor:</label>
                <select class="form-control" name="id_autor">
                    <?php
                        require_once("../controle/livro.php");
                        mostrarAutor();
                        ?>
                </select>
                <label>Quantidade</label>
                <input type="number" name="quantidade" class="form-control">
                <label >Tema:</label>
                <select class="form-control" name="id_tema">
                    <?php
                        mostrarTemas();
                    ?>
                </select>
                <label>Editora:</label>
                <select class="form-control" name="id_editora">
                    <?php
                        mostrarEditoras();
                    ?>
                </select>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Preço de Custo</label>
                    <div class="col-sm-4">
                        <input type="text" name="precocompra" class="form-control" id="inputEmail3" placeholder="Ex:25.50">
                    </div>
                </div>
                    
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-1 col-form-label">Preço de Venda</label>
                    <div class="col-sm-4">
                        <input type="text" name="precovenda" class="form-control" id="inputEmail3" placeholder="Ex:52.05">
                    </div>
                </div>

                <input type="submit" value="Enviar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
