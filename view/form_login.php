<div class="content first-content">
            <div class="first-column">
                <img src="img/logo.png">
                <h2 class="title title-primary">Bem-vindo de volta!</h2>
                <p class="description">O sistema de gerenciamento de estoque e controle de vendas feito para você! </p>
            </div>
            <div class="second-column">
                <h1 class="title title-second">LivraQuim</h1>
                <form class="form" action="controle/login.php" method="POST">
                    <label class="label-input">
                        <i class="far fa-user icon-modify"></i>
                        <input required type="text" name="login" placeholder="CPF">
                    </label>

                    <label class="label-input">
                        <i class="fas fa-lock icon-modify"></i>
                        <input required type="password" name="senha" placeholder="Senha">
                    </label>

                    <input type="submit" value="Enviar">
                    
                </form>
                <p class="forget-password"><a href="#">Esqueceu sua senha?</a></p>
            </div>