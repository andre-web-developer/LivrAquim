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
?>