<?php
  require_once('../banco/Banco.php');
  class Autor{
    public $autor;
    public $id_autor;
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function listarAutor(){
      $sql = "select*from autor";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
                <th scope='row'>$linha[id_autor]</th>
                <td>$linha[nome]</td>
                <td><a href='../controle/autor.php?id_autor=$linha[id_autor]&op=a'><button class='btn btn-warning'>Alterar</button></a></td>
                <td><a href='../controle/autor.php?id_autor=$linha[id_autor]&op=d'><button class='btn btn-danger'>Excluir</button></a></td>
              </tr>";
      }
    }

    public function deletaAutor($id_autor){
      $sql = "DELETE FROM autor WHERE id_autor=$id_autor";
      $resultado = $this->banco->executar($sql);
      if ($resultado) {
        header("Location:../view/listar_autor.php");
      }
      else{
        header("Location:../view/falha_exclusao.php?pagina=autor");
      }
    }

    public function alteraAutor($id_autor){

    }
  }
?>