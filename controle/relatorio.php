<?php
  require_once ("../banco/Banco.php");

  function mensal($ano,$mes){
    $banco = new Banco();
    $sql="SELECT venda.*, formapagamento.formapagamento FROM venda, formapagamento 
          WHERE 
          venda.id_formapagamento = formapagamento.id_formapagamento AND
          MONTH(data)='$mes' AND 
          YEAR(data)='$ano' ";
    $resultado = $banco->consultar($sql);
    if ($resultado!=false) {
      $somatotal=0;
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        $somatotal = $somatotal + $linha['valortotal'];
        echo "<tr>";
        echo "<th scope='row'> $linha[id_venda]</th>";
        echo "<td>$linha[data]</td>";
        echo "<td>$linha[valortotal]</td>";
        echo "<td>$linha[formapagamento]</td>";
        echo "</tr>";
      }
        echo "<tr>
                <td class='table-dark' colspan='10'>Total vendido no mes foi de R$$somatotal</td>
              </tr>";
    } else {
      echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
    }
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
    $banco = new Banco();
    $sql="SELECT venda.*, formapagamento.formapagamento FROM venda, formapagamento 
          WHERE 
          venda.id_formapagamento = formapagamento.id_formapagamento AND
          data='$dia' ";
    $resultado = $banco->consultar($sql);
    
    if ($resultado!=false) {
      $somatotal = 0;
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        $somatotal = $somatotal + $linha['valortotal'];
        echo "<tr>";
        echo "<th scope='row'> $linha[id_venda]</th>";
        echo "<td>$linha[data]</td>";
        echo "<td>$linha[valortotal]</td>";
        echo "<td>$linha[formapagamento]</td>";
        echo "</tr>";
      }
      echo "<tr>
                <td class='table-dark' colspan='10'>Total vendido no dia for de R$$somatotal</td>
              </tr>";    
    } else {
      echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
    }
  }

  function anual($ano){
    $banco = new Banco();
    $sql="SELECT venda.*, formapagamento.formapagamento FROM venda, formapagamento 
          WHERE 
          venda.id_formapagamento = formapagamento.id_formapagamento AND
          YEAR(data)='$ano' ";
    $resultado = $banco->consultar($sql);
    
    if ($resultado!=false) {
      $somatotal = 0;
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        $somatotal = $somatotal + $linha['valortotal'];
        echo "<tr>";
        echo "<th scope='row'> $linha[id_venda]</th>";
        echo "<td>$linha[data]</td>";
        echo "<td>$linha[valortotal]</td>";
        echo "<td>$linha[formapagamento]</td>";
        echo "</tr>";
      }
      echo "<tr>
                <td class='table-dark' colspan='10'>Total vendido no ano foi de R$$somatotal</td>
              </tr>";
    }else{
      echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
    }
  }
?>