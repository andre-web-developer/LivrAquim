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
                <td>Alterar</td>
                <td><a href='../controle/autor.php?id_autor=$linha[id_autor]&op=d'>Deletar</a></td>
              </tr>";
      }
    }

    public function deletaAutor(){
      $sql = "DELETE FROM autor WHERE id_autor=$linha_autor";
      header("Location:../view/sucessocadastro.php?pagina=autor");
    }

    public function auteraAutor(){
      $sql = "NÃO FAÇO IDEIA";
      header("Location:../view/sucessocadastro.php?pagina=autor");
    }
  }
?>