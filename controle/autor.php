<?php
  include_once ("../banco/Banco.php");
  if (isset($_POST['autor'])) {
    $autor = $_POST['autor'];

    $banco = new Banco();
    $sql = "INSERT INTO autor(nome) VALUES ('$autor')";
    if($banco->executar($sql)){
        header("Location:../view/sucesso_cadastro.php");
    }else{
        header("Location:../view/falha_cadastro.php");
    }
  }
?>