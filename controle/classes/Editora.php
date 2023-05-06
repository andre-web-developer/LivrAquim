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
                <td><a href='../controle/editora.php?id_editora=$linha[id_editora]&op=a'><button class='btn btn-warning'>Alterar</button></a></td>
                <td><a href='../controle/editora.php?id_editora=$linha[id_editora]&op=d'><button class='btn btn-danger'>Excluir</button></a></td>
              </tr>";
      }
    }
    public function deletaEditora($id_editora){
      $sql = "DELETE FROM editora WHERE id_editora=$id_editora";
      $resultado = $this->banco->executar($sql);
      if ($resultado) {
        header("Location:../view/listar_editora.php");
      }
      else{
        header("Location:../view/falha_exclusao.php?pagina=editora");
      }
    }

    public function alteraEditora($id_editora){

    }
  }
?>