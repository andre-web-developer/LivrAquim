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
    public function cadastrar($nome,$cnpj,$telefone){
      $sql = "INSERT INTO editora(nome,cnpj,telefone) VALUES('$nome','$cnpj','$telefone')";
      $this->banco->executar($sql);
      
      $sql = "SELECT * FROM editora WHERE nome='$nome'";
      $resultado = $this->banco->consultar($sql);
      $id_editora = $resultado['id_editora'];
      return $id_editora;
    }

    public function mostrar(){
      $sql = "select*from editora";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<option value=$linha[id_editora]>$linha[nome]</option>";
      }
    }

    public function listarEditora(){
      $sql = "SELECT*FROM editora ORDER BY nome";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr class='text-center'>
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
      $resultado = $this->banco->deletar($sql);
      if ($resultado) {
        header("Location:../view/listar_editora.php");
      }
      else{
        header("Location:../view/falha.php?pagina=editora&funcao=Exclusão");
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
          header("Location:../view/falha.php?pagina=editora&funcao=Atualização");
        }
    }
  }
?>