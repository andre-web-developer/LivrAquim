<?php
    require_once("../controle/login.php");
    testa_login();
    require("cabecalho.php"); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <title>Confirmação da venda</title>
</head>
<body>
    <div id="listarCentro">
        <div class="text-center mt-4 mb-4">
            <h2>Cadastro de vendas</h2>
            <p>Confirme os dados e envie para efetuar a venda.</p>
            <hr class="linha">
        </div>

        <?php
            require("../controle/venda.php");
            mostrarCompra();
        ?>


        <form action="../controle/venda.php" method="post">
            <div class="text-center mt-4 mb-4">
                <h2>Metodo de pagamento:</h2>
                <p>Selecione o metodo de pagamento desejado</p>
                <?php
                    echo "<h5>Preço total da compra com desconto de 5% calculado:</h5> <h4>R$$_SESSION[precoprevio]</h4>";
                ?>
            </div>
            
            <div class="text-center mt-4 mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pagamento" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Dinheiro</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pagamento" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">PIX</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pagamento" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">Cartão</label>
                </div>
                <input type="submit"  class="btn btn-primary mb-2" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>