<?php
  require_once('../banco/Banco.php');
  class Tema{
    public $tema;
    public $id_tema;
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function cadastrar($tema){
      $sql = "INSERT INTO tema(tema) VALUES('$tema')";
      $resultado = $this->banco->executar($sql);
      if($resultado){
        header("Location:../view/sucesso.php?pagina=tema&funcao=Cadastro");
      }
      else{
        header("Location:../view/falha.php?pagina=tema&funcao=Cadastro");
      }
    }

    public function mostrar(){
      $sql = "select*from tema";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<option value=$linha[id_tema]>$linha[tema]</option>";
      }
    }

    public function listarTemas(){
      $sql = "SELECT*FROM tema ORDER BY tema";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr class='text-center'>
                <td>$linha[tema]</td>
                <td><a href='../controle/tema.php?id_tema=$linha[id_tema]&op=a'><button type='button' class='btn btn-warning'>Alterar</button></a></td>
                <td><a href='../controle/tema.php?id_tema=$linha[id_tema]&op=d'><button type='button' class='btn btn-danger'>Excluir</button></a></td>
              </tr>";
      }
    }

    public function deletaTema($id_tema){
      $sql = "DELETE FROM tema WHERE id_tema=$id_tema";
      $resultado = $this->banco->deletar($sql);
      if ($resultado) {
        header("Location:../view/listar_tema.php");
      }
      else{
        header("Location:../view/falha.php?pagina=tema&funcao=Exclusão");
      }
    }
  
    public function getTema($id_tema){
      $sql = "SELECT*FROM tema WHERE id_tema=$id_tema";
      $resultado = $this->banco->consultar($sql);
      return $resultado['tema'];
    }

    public function atualizaTema($id_tema,$tema){
        $sql="UPDATE tema SET tema='$tema' WHERE id_tema='$id_tema'";
        $resultado = $this->banco->executar($sql);
        if($resultado){
          header("Location:../view/listar_tema.php");
        }
        else{
          header("Location:../view/falha.php?pagina=tema&funcao=Atualização");
        }
    }
  }
?>