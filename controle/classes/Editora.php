<?php
  require_once('../banco/Banco.php');
  class Editora{
    public $nome;
    public $id_autor;
    public $cnpj;
    public $telefone;
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function listarEditora(){
      $sql = "select*from editora";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
                <th scope='row'>$linha[id_editora]</th>
                <td>$linha[nome]</td>
                <td>$linha[cnpj]</td>
                <td>$linha[telefone]</td>
                <td>Alterar</td>
                <td>Excluir</td>
              </tr>";
      }
    }
  }
?>