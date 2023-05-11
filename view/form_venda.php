<?php
    require_once("../controle/login.php");
    testa_login();
    require_once("cabecalho.php")
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
    <title>Formulário Vendas</title>
</head>
<body>
    <div id="listarCentro">
        <div class="text-center mt-4 mb-4">
            <h2>Cadastro de vendas</h2>
            <p>Prencha os todos os dados do formulário sempre seguindo os exemplos quando existentes.</p>
        </div>

        <form action="../controle/venda.php" method="POST">
            <?php
                require("../controle/venda.php");
                mostrarProdutos();
                ?>

            <div id="listarCentro">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="precoprevio" id="precoprevio" placeholder="Preço total">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary mb-2" value="Enviar">
                    </div>
                </div>
            </div>
        </form>

        </div>
            <script type="text/javascript">
                var carrinho = [];
                var precoprevio = 0;

                function somar(item){
                    precoprevio += parseFloat(item);
                }

                function update(id_livro){
                    var quantidade = this.document.getElementById('quantidade'+id_livro);
                    var preco = this.document.getElementById('precovenda'+id_livro);
                    var mostrar = this.document.getElementById('mostratotalitem'+id_livro);
                    var precototalitem = this.document.getElementById('precototalitem'+id_livro);
                
                    if(quantidade.value==0){
                        precototalitem.value = (quantidade.value*preco.value).toFixed(2);
                        mostrar.style.display = "none";

                        carrinho.splice(id_livro,1);
                        precoprevio=0;
                        carrinho.forEach(somar);

                        document.getElementById('precoprevio').value = precoprevio.toFixed(2);
                    }
                    else{
                        precototalitem.value = (quantidade.value*preco.value).toFixed(2);
                        mostrar.style.display = "inline";

                        carrinho[id_livro] = (quantidade.value*preco.value).toFixed(2);
                        
                        precoprevio = 0;
                        carrinho.forEach(somar);
            
                        document.getElementById('precoprevio').value = precoprevio.toFixed(2);
                    }
                }       
            </script>

</body>
</html>