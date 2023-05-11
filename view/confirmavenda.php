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
    <title>Confirmação</title>
</head>
<body>
    <?php
        require("../controle/venda.php");
        mostrarCompra();
    ?>

    <form action="../controle/venda.php" method="post">
        <h2>Metodo de pagamento:</h2><br>
        <input type="radio" name="pagamento" value="1">
        <label for="dinheiro">Dinheiro</label>
        
        <input type="radio" name="pagamento" value="2">
        <label for="pix">PIX</label>
        
        
        <input type="radio" name="pagamento" value="3">
        <label for="cartao">Cartão</label>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>