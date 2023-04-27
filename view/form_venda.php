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
    <link rel="stylesheet" href="venda.css">
    <title>Efetuar Vendas</title>
</head>
<body>
  <div id="principal">
    <h2>Efetuar Vendas</h2>
    <form action="../controle/venda.php" method="POST">
      
      <p class="form" name="livro">
        <?php
          require_once("../controle/venda.php");
          mostraProdutos();
          ?>
      </p>
      
      <label>Sub total</label>
      <input type="text" disabled='' name="precoprevio" id="precoprevio" value=""><br>
    
      <input required type="submit" value="Enviar">
    </form>
  </div>
  
  <script type="text/javascript">
    var precoprevio = 0;

    function update(id_livro){
      var quantidade = this.document.getElementById('quantidade'+id_livro);
      let preco = this.document.getElementById('precovenda'+id_livro);
      let mostrar = this.document.getElementById('mostratotalitem'+id_livro);
      let precototalitem = this.document.getElementById('precototalitem'+id_livro);

      precototalitem.value = (preco.value*quantidade.value).toFixed(2);
      mostrar.style.display = "inline";
    }

  </script>
</body>