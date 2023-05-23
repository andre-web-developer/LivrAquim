<?php
  require_once('../banco/Banco.php');
  class Autor{
    public $autor;
    public $id_autor;
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function cadastrar($nome){
      $sql = "INSERT INTO autor(nome) VALUES('$nome')";
      $banco = new Banco();
      $resultado = $this->banco->executar($sql);
      if($resultado){
        header("Location:../view/sucesso.php?pagina=autor&funcao=Cadastro");
      }
      else{
        header("Location:../view/falha.php?pagina=autor&funcao=Cadastro");
      }
    }
      
    public function mostrar(){
      $sql = "select*from autor";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<option value=$linha[id_autor]>$linha[nome]</option>";
      }
    }

    public function listarAutor(){
      $sql = "SELECT*FROM autor ORDER BY nome";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr class='text-center'>
                <td>$linha[nome]</td>
                <td><a href='../controle/autor.php?id_autor=$linha[id_autor]&op=a'><button class='btn btn-warning'>Alterar</button></a></td>
                <td><a href='../controle/autor.php?id_autor=$linha[id_autor]&op=d'><button class='btn btn-danger'>Excluir</button></a></td>
              </tr>";
      }
    }

    public function deletaAutor($id_autor){
      $sql = "DELETE FROM autor WHERE id_autor=$id_autor";
      $resultado = $this->banco->deletar($sql);
      if ($resultado) {
        header("Location:../view/listar_autor.php");
      }
      else{
        header("Location:../view/falha.php?pagina=autor&funcao=Listagem");
      }
    }

    public function getNome($id_autor){
      $sql = "SELECT*FROM autor WHERE id_autor=$id_autor";
      $resultado = $this->banco->consultar($sql);
      return $resultado['nome'];
    }

    public function atualizaAutor($id_autor,$autor){
        $sql="UPDATE autor SET nome='$autor' WHERE id_autor='$id_autor'";
        $resultado = $this->banco->executar($sql);
        if($resultado){
          header("Location:../view/listar_autor.php");
        }
        else{
          header("Location:../view/falha.php?pagina=autor&funcao=Atualização");
        }
    }
  }
?>