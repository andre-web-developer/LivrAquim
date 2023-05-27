<?php
  require_once('../banco/Banco.php');
  class Relarorio{
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function relatMensal($mes,$ano){
      $sql="SELECT venda.*, livro.precocompra, livro.precovenda, venda_livro.quantidade_venda, formapagamento.formapagamento, (livro.precovenda - livro.precocompra) * venda_livro.quantidade_venda AS lucro
            FROM venda
            INNER JOIN formapagamento ON venda.id_formapagamento = formapagamento.id_formapagamento
            INNER JOIN venda_livro ON venda_livro.id_venda = venda.id_venda
            INNER JOIN livro ON venda_livro.id_livro = livro.id_livro
            WHERE MONTH(data)='$mes'
            AND YEAR(data)='$ano' 
            GROUP BY venda.id_venda";

      $resultado = $this->banco->consultar($sql);
      if ($resultado!=false) {
        $totalvendido=0;
        $lucrototal = 0;
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          $totalvendido = $totalvendido + $linha['valortotal'];
          $lucroVenda = $linha['lucro'] - ($linha['lucro'] * 0.05);
          $lucrototal = $lucrototal + $lucroVenda;
          echo "<tr>";
          echo "<td>$linha[data]</td>";
          echo "<td>$linha[valortotal]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "<td>".round($lucroVenda,2)."</td>";
          echo "</tr>";
        }
          echo "<tr>
                  <td class='table-dark' colspan='10'>Total vendido no mes foi de R$$totalvendido, com lucro total de R$$lucrototal</td>
                </tr>";
      } else {
        echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
      }
    }

    public function relatDiario($dia){
      $sql="SELECT venda.*, livro.precocompra, livro.precovenda, venda_livro.quantidade_venda, formapagamento.formapagamento, (livro.precovenda - livro.precocompra) * venda_livro.quantidade_venda AS lucro
            FROM venda
            INNER JOIN formapagamento ON venda.id_formapagamento = formapagamento.id_formapagamento
            INNER JOIN venda_livro ON venda_livro.id_venda = venda.id_venda
            INNER JOIN livro ON venda_livro.id_livro = livro.id_livro
            WHERE DAY(data) = '$dia' 
            GROUP BY venda.id_venda";
      $resultado = $this->banco->consultar($sql);
      
      if ($resultado!=false) {
        $totalvendido = 0;
        $lucrototal = 0;
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          $totalvendido = $totalvendido + $linha['valortotal'];
          $lucroVenda = $linha['lucro'] - ($linha['desconto'] * 0.05);
          $lucrototal = $lucrototal + $lucroVenda;
          echo "<tr>";
          echo "<td>$linha[data]</td>";
          echo "<td>$linha[valortotal]</td>";
          echo "<td>$linha[formapagamento]</td>";
          echo "<td>".round($lucroVenda,2)."</td>";
          echo "</tr>";
        }
        echo "<tr>
                  <td class='table-dark' colspan='10'>Total vendido no dia for de R$$totalvendido, com lucro total de R$$lucrototal</td>
                </tr>";    
      } else {
        echo "<h3 style='color: red; text-align: center;'>Não existem dados nessa tabela.</h3>";
      }
    }

    public function relatAnual($ano){
      $sql="SELECT venda.*, livro.precocompra, livro.precovenda, venda_livro.quantidade_venda, formapagamento.formapagamento, (livro.precovenda - livro.precocompra) * venda_livro.quantidade_venda AS lucro
            FROM venda
            INNER JOIN formapagamento ON venda.id_formapagamento = formapagamento.id_formapagamento
            INNER JOIN venda_livro ON venda_livro.id_venda = venda.id_venda
            INNER JOIN livro ON venda_livro.id_livro = livro.id_livro
            (CASE
              WHEN id_venda = id_venda THEN 
              ELSE City
            END)
            WHERE YEAR(data) = '$ano'";
      $resultado = $this->banco->consultar($sql);
      $totalvendido = 0;
      $lucrototal = 0;
      if ($resultado!=false){
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
            $totalvendido = $totalvendido + $linha['valortotal'];
            $lucroVenda = $linha['lucro'] - ($linha['lucro'] * 0.05);
            $lucrototal = $lucrototal + $lucroVenda;
            echo "<tr>";
            echo "<td>$linha[data]</td>";
            echo "<td>$linha[valortotal]</td>";
            echo "<td>$linha[formapagamento]</td>";
            echo "<td>".round($lucroVenda,2)."</td>";
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