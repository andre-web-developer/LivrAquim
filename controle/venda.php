<?php
  include_once ("../banco/Banco.php");
  if (isset($_POST['tema'])) {
    $tema = $_POST['tema'];

    $banco = new Banco();
    $sql = "INSERT INTO tema(tema) VALUES ('$tema')";
    if($banco->executar($sql)){
      header("Location:../view/sucesso_cadastro.php");
    }else{
      header("Location:../view/falha_cadastro.php");
    }
  }
  function mostraProdutos(){
    $banco = new Banco();
      $sql = "select*from livro";
      $resultado = $banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<br><img src='../$linha[foto]'><br>";
        echo "ISBN = $linha[isbn]<br>";
        echo "Titulo = $linha[titulo]<br>";
        echo "Quantidade = <select name='$linha[quantidade]' id='quantidade$linha[id_livro]' onChange='update($linha[id_livro])'>";
          for ($i=0; $i <= $linha['quantidade']; $i++) { 
            if ($i==0) {
              echo "<option value=$i>-</option>";
            }else{
              echo"<option value=$i>$i</option>";
            }
          }echo "</select> <br>";

        echo "Preço unitario = <input type='text' disabled='' id='precovenda$linha[id_livro]' value='$linha[precovenda]'><br>";
        echo "<span id='mostratotalitem$linha[id_livro]' style='display:none;'>
                Subtotal:<input type='text' disabled='' id='precototalitem$linha[id_livro]' value=''>
              </span>";
      } 
  }
