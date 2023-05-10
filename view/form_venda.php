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
    <link rel="stylesheet" href="../css/listar.css">
    <title>Formulário Vendas</title>
</head>
<body>
    <div id="listaCentro">
        <?php
            require("cabecalho.php");
        ?>
    <form action="../controle/venda.php" method="POST">
                <?php
                    require("../controle/venda.php");
                    mostrarProdutos();
                ?>

                <br><h2>Total da Venda: <h2><input type="text" name="precoprevio" id="precoprevio" value="">
                <input type="submit" value="Enviar">
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