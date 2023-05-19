<div class="content first-content">
    <div class="first-column">
        <img src="img/logo-login.png">
    </div>
    <div class="second-column">
        <h1 class="title title-second">Login</h1>
        <?php
            if(isset($_GET['falha'])&&($_GET['falha']==true)) {
                //echo "<script>alert('Senha ou CPF incorreto!');</script>";
                //aprender a estiizar essa caceta
                echo "  <dialog open id='favDialog'>
                            <h4>Senha ou CPF incorreto!</h4>
                        </dialog>";
                
            }
        ?>
        <form class="form" action="controle/login.php" method="POST">
            <label class="label-input">
                <i class="far fa-user icon-modify"></i>
                <input class="cadastro" type="text" name="login" placeholder="CPF">
            </label>

            <label class="label-input">
                <i class="fas fa-lock icon-modify"></i>
                <input class="cadastro" type="password" name="senha" placeholder="Senha">
            </label>

            <input class="btn" type="submit" value="Enviar">
            
        </form>
        <p class="forget-password"><a href="#">Esqueceu sua senha?</a></p>
    </div>
</div>
<script>
    (function(){
        var favDialog = document.getElementById("favDialog");
        favDialog.showModal();
    })();
</script>