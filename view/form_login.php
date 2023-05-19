<div class="content first-content">
    <div class="first-column">
        <img src="img/logo-login.png">
    </div>
    <div class="second-column">
        <h1 class="title title-second">Login</h1>
        <?php
            if(isset($_GET['falha'])&&($_GET['falha']==true)) {
                echo "  <a class='popup-modal' href='#test-modal'>Open modal</a>

                        <div id='test-modal' class=mfp-hide white-popup-block'>
                            <h1>Modal dialog</h1>
                            <p>You won't be able to dismiss this by usual means (escape or
                                click button), but you can close it programatically based on
                                user choices or actions.</p>
                            <p><a class='popup-modal-dismiss' href='#'>Dismiss</a></p>
                        </div> ";
                
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
    $(function () {
        $('.popup-modal').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#username',
            modal: true
        });
        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
    });
</script>