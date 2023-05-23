<?php
  require_once ("classes/Relatorio.php");

  function mensal($ano,$mes){
    $objeto = new Relarorio();
    $objeto->relatMensal($mes,$ano);
  }

  function retornaMes($mes){
    $meses['01']="janeiro";
    $meses['02']="fevereiro";
    $meses['03']="março";
    $meses['04']="abril";
    $meses['05']="maio";
    $meses['06']="junho";
    $meses['07']="julho";
    $meses['08']="agosto";
    $meses['09']="setembro";
    $meses['10']="outubro";
    $meses['11']="novembro";
    $meses['12']="dezembro";

    return $meses[$mes];
  }

  function diario($dia){
    $objeto = new Relarorio();
    $objeto->relatDiario($dia);
  }

  function anual($ano){
    $objeto = new Relarorio();
    $objeto->relatAnual($ano);
  }
?>