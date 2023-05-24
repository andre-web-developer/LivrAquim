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
      $sql="SELECT venda.*, livro.precocompra, livro.precovenda, venda_livro.quantidade_venda, formapagamento.formapagamento 
            FROM venda, formapagamento, livro, venda_livro 
            WHERE venda.id_formapagamento = formapagamento.id_formapagamento 
            AND venda_livro.id_livro = livro.id_livro 
            AND venda_livro.id_venda = venda.id_venda 
            AND YEAR(data)='$ano' ";
      $resultado = $this->banco->consultar($sql);
      $totalvendido = 0;
      $lucrototal = 0;
      if ($resultado!=false){
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          $totalvendido = $totalvendido + $linha['valortotal'];
          $lucrototal = $lucrototal + $linha['precovenda'] - $linha['precocompra'];
          $lucrototal = round($lucrototal - ($lucrototal*0.05), 2);
          echo "<tr>";
          echo "<td>$linha[data]</td>";
          echo "<td>$linha[valortotal]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "<td>COMO COLOCAR O LUCRO??????</td>";
          echo "</tr>";
        }
        echo "<tr>
                <td class='table-dark' colspan='10'>Total vendido no ano foi de R$$totalvendido, com lucro total de R$$lucrototal</td>
              </tr>";
      }else{
        echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
      }
    }
  }
?>