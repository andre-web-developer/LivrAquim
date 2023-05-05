<?php
  require_once('../banco/Banco.php');
  class Tema{
    public $tema;
    public $id_tema;
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function listarTemas(){
      $sql = "select*from tema";
      $resultado = $this->banco->consultar($sql);


      $deletaButton = "Deletar";
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
                <th scope='row'>$linha[id_tema]</th>
                <td>$linha[tema]</td>
                <td>Alterar</td>
                <td>Excluir</td>
              </tr>";
      }
    }
  }
?>