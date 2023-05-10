<?php
    require_once("../controle/login.php");
    testa_login();
    require("cabecalho.php");
    $pagina = $_GET['pagina'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Falha na exclusão</title>
</head>
<body>
    <div class="text-center mt-5 mb-4">
        <h2>Falha ao tentar excluir item!</h2>
        <p>A exclusão do item falhou por existir dependencias nos dados, caso possível, considere apenas alteralo.</p>
        <a href="form_<?php echo $pagina.".php"; ?>"><button type="submit" class="btn btn-primary mr-2 mt-5">Tente alterar</button></a>
        <a href="bem_vindo.php"><button type="submit" class="btn btn-primary ml-2 mt-5">Volte ao inicio</button></a>
    </div>
</body>
</html>