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
        <h3>A exclusão do item falhou por existir dependencias nos dados, por favor considere apenas alteralo:</h3>
        <a href="form_<?php echo $pagina.".php"; ?>">Tente alterar</a>
        <a href="bem_vindo.php"; ?>Volte ao inicio</a>
    </div>
</body>
</html>