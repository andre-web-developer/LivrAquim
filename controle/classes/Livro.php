<?php
require_once('../banco/Banco.php');
class Livro{

    public $id_livro;
    public $isbn;
    public $titulo;
    public $ano;
    public $id_autor;
    public $quantidade;
    public $id_tema;
    public $id_editora;
    public $precocusto;
    public $precovenda;
    public $banco;

    function __construct(){
        $this->banco = new Banco();
    }

    public function listarLivro(){
        $sql = "SELECT livro.*, editora.nome AS editora,tema.tema,autor.nome FROM livro,editora,tema,autor WHERE    
                livro.id_editora = editora.id_editora AND
                livro.id_autor = autor.id_autor AND
                livro.id_tema = tema.id_tema
                ORDER BY quantidade DESC;";
        $resultado = $this->banco->consultar($sql);
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "  <tr>
                    <th scope='row'><img src='../$linha[foto]' width'50' height='100'></th>
                    <td class='px-50 py-5 text-center'>$linha[isbn]</td>
                    <td class='px-50 py-5 text-center'>$linha[titulo]</td>
                    <td class='px-50 py-5 text-center'>$linha[quantidade]</td>
                    <td class='px-50 py-5 text-center'>$linha[nome]</td>
                    <td class='px-50 py-5 text-center'>$linha[editora]</td>
                    <td class='px-50 py-5 text-center'>$linha[tema]</td>
                    <td class='px-50 py-5 text-center'><a href='../controle/livro.php?id_livro=$linha[id_livro]&op=a'><button type='button' class='btn btn-warning'>Alterar</button></a></td>
                    <td class='px-50 py-5 text-center'><a href='../controle/livro.php?id_livro=$linha[id_livro]&op=d'><button type='button' class='btn btn-danger'>Excluir</button></a></td>
                </tr>";
        }
    }
    public function deletaLivro($id_livro){
        $sql = "DELETE FROM livro WHERE id_livro=$id_livro";
        $resultado = $this->banco->executar($sql);
        if ($resultado) {
            header("Location:../view/listar_livro.php");
        }
        else{
            header("Location:../view/falha_exclusao.php?pagina=livro");
        }
    }
    
    public function getLivro($id_livro){
        $sql = "SELECT*FROM livro WHERE id_livro=$id_livro";
        $resultado = $this->banco->consultar($sql);
        return $resultado;
    }

    public function atualizaLivro($id_livro,$isbn,$titulo,$ano,$quantidade,$precovenda,$precocompra){
        $sql="UPDATE livro SET isbn='$isbn', titulo='$titulo', ano='$ano', quantidade='$quantidade', precovenda='$precovenda', precocompra='$precocompra' WHERE id_livro='$id_livro'";
        $resultado = $this->banco->executar($sql);
        if($resultado){
        header("Location:../view/listar_livro.php");
        }
        else{
        header("Location:../view/falha_atualizar.php?pagina=livro");
        }
    }
}
?>