<?php
    session_start();
    if(isset($_SESSION['nome']))
    header("Location:view/bem_vindo.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <img src="img/logo-login.png">
            </div>
            <div class="second-column">
                <h1 class="title title-second">Login</h1>
                <?php
                    if(isset($_GET['falha'])&&($_GET['falha']==true)) {
                        echo "<p style='color: red;'>CPF ou senha incorretos, tente novamente.</p>";
                    }
                    
                    if(isset($_GET['recuperacao'])) {
                        switch ($_GET['recuperacao']) {
                            case 'true':
                                echo "<p style='color: green;'>Senha Atualizada, pode efetuar o login com ela.</p>";
                                break;
                            
                            case 'true':
                                echo "<p style='color: red;'>Atualização da senha falhou, tente novamente ou entre em contato com o administrador do sistema.</p>";
                                break;
                        }
                    }
                ?>
                <form class="form" action="controle/login.php" method="POST">
                    <label class="label-input">
                        <i class="far fa-user icon-modify"></i>
                        <input class="cadastro" type="text" name="cpf" placeholder="CPF - apenas números">
                    </label>

                    <label class="label-input">
                        <i class="fas fa-lock icon-modify"></i>
                        <input class="cadastro" type="password" name="senha" placeholder="Senha">
                    </label>

                    <input class="btn" type="submit" value="Enviar">

                    <a href="view/esquecer_senha.php" class="forget-password">Esqueceu a senha?</a>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>