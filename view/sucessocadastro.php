<?php
    require_once("../controle/login.php");
    testa_login();
    require("cabecalho.php");
    $pagina = $_GET['pagina'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro efetuado!</title>
</head>
<body>
    <div id="principal">
        <h3>Cadastro efetuado com sucesso!</h3>
        <a href="form_<?php echo $pagina.".php"; ?>"> ISSO É UM TESTEZAO PRA VENDA</a>
        
</body>
</html>