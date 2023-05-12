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

    public function getEditora($id_editora){
      $sql = "SELECT*FROM editora WHERE id_editora=$id_editora";
      $resultado = $this->banco->consultar($sql);
      return $resultado;
    }

    public function atualizaEditora($id_editora,$editora,$cnpj,$telefone){
        $sql="UPDATE editora SET nome='$editora', cnpj='$cnpj', telefone='$telefone' WHERE id_editora='$id_editora'";
        $resultado = $this->banco->executar($sql);
        if($resultado){
          header("Location:../view/listar_editora.php");
        }
        else{
          header("Location:../view/falha_atualizar.php?pagina=editora");
        }
    }
  }
?>