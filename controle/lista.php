<?php

  require_once ("../banco/Banco.php");

  function listaAutor(){
    //aprender a fazer o CRUD
    $banco = new Banco();
    $sql = "select*from autor";
    $resultado = $banco->consultar($sql);
    while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
      echo "$linha[nome]<br>";  
    }
  }