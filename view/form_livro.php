<?php
    require_once("../controle/login.php");
    testa_login();
    require_once("../controle/livro.php");
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
    <title>Cadastro de Livro</title>
    <style>        
        #img{
            display: none;
        }
    </style>
</head>
<body>
    <?php
        require("cabecalho.php");
    ?>
    <div id="listarCentro">
        <div class="text-center mt-4 mb-4">
            <h2>Cadastro de Livro</h2>
            <p>Prencha os todos os dados do formulário sempre seguindo os exemplos quando existentes.</p>
            <hr class="linha">
        </div>
        
        <form enctype="multipart/form-data" action="../controle/livro.php" method="POST">
            <div class="form-group">
                <label><h6>Foto da capa:</h6></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fotolivro" name="foto">
                        <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                    </div>
                    <div class="text-center mt-4"  id="img" style="display: none;">
                        <img id="preview" width="150px" height="200px" src="" > 
                    </div>
            </div>
    
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label><h6>ISBN:</h6></label>
                    <input type="text" name="isbn" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label><h6>Título:</h6></label>
                    <input type="text" name="titulo" class="form-control">
                </div>

                <div class="form-group col-md-2">
                    <label><h6>Quantidade:</h6></label>
                    <input type="number" name="quantidade" class="form-control">
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
                            for ($i=2023; $i>=1950; $i--) { 
                                echo "<option value='$i'>$i</option>";
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
                        <?php
                            mostrarTemas();
                        ?>
                    </select>
                </div>
            </div>
                
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><h6>Preço de Custo</h6></label>
                <div class="col-sm-9">
                    <div class="form-group row">
                        <label class="col-sm col-form-label"><h6>R$</h6></label>
                        <div class="col-sm-11">
                            <input type="text" name="precocompra" class="form-control" placeholder="Ex: 10.00">
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
                            <input type="text" name="precovenda" class="form-control" placeholder="Ex: 100.00">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Cadastrar" class="btn btn-primary m-auto">
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
</html>