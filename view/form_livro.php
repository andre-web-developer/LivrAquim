<?php
    require_once("../controle/login.php");
    testa_login();
    require_once("../controle/livro.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <title>Cadastro de Livro</title>
<body>
    <?php
        require("cabecalho.php");
    ?>
    <div id="listarCentro">
        <div class="text-center mt-4 mb-4">
            <h2>Cadastro de Livro</h2>
            <p>Prencha os todos os dados do formulário para poder efetuar o cadastro corretamente.</p>
            <h4>Caso seu autor, editora ou tema não esteja entre as opções, selecione "cadastrar novo" e preencha as informações necessárias</h4>
            <hr class="linha">
        </div>
        
        <form enctype="multipart/form-data" action="../controle/livro.php" method="POST">
            <div class="form-group">
                <label><h6>Foto da capa:</h6></label>
                    <div class="custom-file">
                        <input required type="file" class="custom-file-input" id="fotolivro" name="foto">
                        <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                    </div>
                    <div class="text-center mt-4"  id="img">
                        <img id="preview" width="150px" height="200px" src=""> 
                    </div>
            </div>
    
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label><h6>ISBN:</h6></label>
                    <input required type="text" name="isbn" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label><h6>Título:</h6></label>
                    <input required type="text" name="titulo" class="form-control">
                </div>

                <div class="form-group col-md-2">
                    <label><h6>Quantidade:</h6></label>
                    <input required type="number" name="quantidade" class="form-control">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-7">
                    <label><h6>Autor:</h6></label>
                    <select required class="form-control" name="id_autor" id="select-autor">
                        <option selected>Escolher...</option>
                        <option value="novo-autor">Cadastrar novo</option>
                        <?php
                            mostrarAutor();
                        ?>
                    </select>
                    <div id="campo-novo-autor" style="display: none;">
                        <input type="text" name="novo_autor" placeholder="Nome do novo autor" class="form-control">
                    </div>
                </div>

                <div class="form-group col-md-5">
                    <label class="form-label"><h6>Ano:</h6></label>
                        <select required class="form-control" name="ano">
                            <?php
                                for ($i=date('Y'); $i >= 1950; $i--) { 
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>                
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label><h6>Editora:</h6></label>
                    <select required class="form-control" name="id_editora" id="select-editora">
                        <option selected>Escolher...</option>
                        <option value="nova-editora">Cadastrar nova</option>
                        <?php
                            mostrarEditoras();
                        ?>
                    </select>
                    <div id="campo-nova-editora" style="display: none;">
                        <input type="text" name="nova_editora" placeholder="Nome da nova editora" class="form-control">
                        <input type="text" name="cnpj" placeholder="CNPJ da nova editora" class="form-control">
                        <input type="text" name="telefone" placeholder="Telefone da nova editora" class="form-control">
                    </div>
                </div>

                <div class="form-group col-md-7">
                    <label><h6>Tema:</h6></label>
                    <select required class="form-control" name="id_tema" id="select-tema">
                        <option selected>Escolher...</option>
                        <option value="novo-tema">Cadastrar novo</option>
                        <?php
                            mostrarTemas();
                        ?>
                    </select>
                    <div id="campo-novo-tema" style="display: none;">
                        <input type="text" name="novo_tema" placeholder="Nome do novo tema" class="form-control">
                    </div>
                </div>
            </div>
                
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><h6>Preço de Custo</h6></label>
                <div class="col-sm-9">
                    <div class="form-group row">
                        <label class="col-sm col-form-label"><h6>R$</h6></label>
                        <div class="col-sm-11">
                            <input required type="text" name="precocompra" class="form-control">
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
                            <input required type="text" name="precovenda" class="form-control">
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
            let file = new FileReader();
            file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
            };       
                file.readAsDataURL(this.files[0]);
                document.getElementById("img").style.display = "block";
            }
        }

        document.getElementById("fotolivro").addEventListener("change", readImage, false);

        //cadastrando em multiplas tabelas com o mesmo form
        var selectAutor = document.getElementById("select-autor");
        var campoNovoAutor = document.getElementById("campo-novo-autor");
        selectAutor.addEventListener("change", function() {
            if (selectAutor.value === "novo-autor") {
                campoNovoAutor.style.display = "block";
            } else {
                campoNovoAutor.style.display = "none";
            }
        });

        var selectTema = document.getElementById("select-tema");
        var campoNovoTema = document.getElementById("campo-novo-tema");
        selectTema.addEventListener("change", function() {
            if (selectTema.value === "novo-tema") {
                campoNovoTema.style.display = "block";
            } else {
                campoNovoTema.style.display = "none";
            }
        });

        var selectEditora = document.getElementById("select-editora");
        var campoNovaEditora = document.getElementById("campo-nova-editora");
        selectEditora.addEventListener("change", function() {
            if (selectEditora.value === "nova-editora") {
                campoNovaEditora.style.display = "block";
            } else {
                campoNovaEditora.style.display = "none";
            }
        });
    </script>
</body>
</html>