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
       Escolha uma foto da capa: <input type="file" id="fotolivro" name="foto" multiple>
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
          </div><br>
          <div class="clearfix"></div>
          </div>

            <label>ISBN: </label>
            <input type="text" name="isbn"><br>
            <label>Título: </label>
            <input type="text" name="titulo"><br>
            <label>Ano: </label>
            <select name="ano">
                <?php
                    for ($i=2023; $i>=1950; $i--) { 
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select><br>
            <label>Autor:</label>
            <select name="id_autor">
                <?php
                    require_once("../controle/livro.php");
                    mostrarAutor();
                ?>
            </select>
            <label>Quantidade</label>
            <input type="number" name="quantidade"><br>
            <label>Tema:</label>
            <select name="id_tema">
                <?php
                    mostrarTemas();
                ?>
            </select> <br>
            <label>Editora:</label>
            <select name="id_editora">
                <?php
                    mostrarEditoras();
                ?>
            </select><br>
            <label> Preço de Custo </label>
            <input type="text" name="precocompra"><br>
            <label> Preço de Venda </label>
            <input type="text" name="precovenda"><br><br>
            <input type="submit" value="Enviar">
       </form>
    </div>
</body>
</html>
