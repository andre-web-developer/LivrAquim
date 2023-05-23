<?php
  require_once('../banco/Banco.php');
  class Relarorio{
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function relatMensal($mes,$ano){
      $sql="SELECT venda.*, formapagamento.formapagamento FROM venda, formapagamento 
            WHERE venda.id_formapagamento = formapagamento.id_formapagamento AND
            MONTH(data)='$mes' AND 
            YEAR(data)='$ano' ";

      $resultado = $this->banco->consultar($sql);
      if ($resultado!=false) {
        $totalvendido=0;
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          $totalvendido = $totalvendido + $linha['valortotal'];
          echo "<tr>";
          echo "<td>$linha[data]</td>";
          echo "<td>$linha[valortotal]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "</tr>";
        }
          echo "<tr>
                  <td class='table-dark' colspan='10'>Total vendido no mes foi de R$$totalvendido</td>
                </tr>";
      } else {
        echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
      }
    }

    public function relatDiario($dia){
      $sql="SELECT venda.*, formapagamento.formapagamento FROM venda, formapagamento
            WHERE venda.id_formapagamento = formapagamento.id_formapagamento AND
            data='$dia' 
            ORDER BY id_venda";
      $resultado = $this->banco->consultar($sql);
      
      if ($resultado!=false) {
        $totalvendido = 0;
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          $totalvendido = $totalvendido + $linha['valortotal'];
          echo "<tr>";
          echo "<td>$linha[data]</td>";
          echo "<td>$linha[valortotal]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "</tr>";
        }
        echo "<tr>
                  <td class='table-dark' colspan='10'>Total vendido no dia for de R$$totalvendido</td>
                </tr>";    
      } else {
        echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
      }
    }

    public function relatAnual($ano){
      $sql="SELECT venda.*, formapagamento.formapagamento FROM venda, formapagamento 
          WHERE venda.id_formapagamento = formapagamento.id_formapagamento AND
          YEAR(data)='$ano' ";
      $resultado = $this->banco->consultar($sql);
      
      if ($resultado!=false){
        $totalvendido = 0;
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          $totalvendido = $totalvendido + $linha['valortotal'];
          echo "<tr>";
          echo "<td>$linha[data]</td>";
          echo "<td>$linha[valortotal]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "</tr>";
        }
        echo "<tr>
                <td class='table-dark' colspan='10'>Total vendido no ano foi de R$$totalvendido, com lucro total de R$</td>
              </tr>";
      }else{
        echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
      }
    }
  }
?>