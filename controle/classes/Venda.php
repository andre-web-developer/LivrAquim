<?php
  require_once('../banco/Banco.php');
  class Venda{
    public $banco;

    public function __construct(){
      $this->banco = new Banco();
    }

    public function livrosVenda(){
      $sql = "SELECT livro.*, editora.nome AS editora,tema.tema,autor.nome FROM livro,editora,tema,autor WHERE    
              livro.id_editora = editora.id_editora AND
              livro.id_autor = autor.id_autor AND
              livro.id_tema = tema.id_tema AND
              quantidade>0";
      $resultado = $this->banco->consultar($sql);
      while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo" <hr class='linha2'>   
              <div class='row venda'>
                <div class='col-sm-4 mb-5'>
                  <img class='img-fluid' src='$linha[foto]' width='150' height='200px'>
                </div>
                
                <div class='col-sm-8'>
                  <div class='row m-0 mb-3'>
                    <label for='staticTitilo' class='col-form-label'><h6>Título:</h6></label>
                    <div class='col-sm-9'>
                      <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$linha[titulo]'>
                    </div>
                  </div>

                  <div class='row m-0 mb-3'>
                    <label for='staticTitilo' class='col-form-label'><h6>Ano:</h6></label>
                    <div class='col-sm-9'>
                      <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$linha[ano]'>
                    </div>
                  </div>
                  
                  <div class='row m-0 mb-3'>
                    <label for='staticTitilo' class='col-form-label'><h6>Autor:</h6></label>
                    <div class='col-sm-9'>
                      <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$linha[nome]'>
                    </div>
                  </div>
                  
                  <div class='row m-0 mb-3'>
                    <label for='staticTitilo' class='col-form-label'><h6>Editora:</h6></label>
                    <div class='col-sm-9'>
                      <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$linha[editora]'>
                    </div>
                  </div>

                  <div class='row m-0 mb-3'>
                    <label for='staticTitilo' class='col-form-label'><h6>Tema:</h6></label>
                    <div class='col-sm-9'>
                      <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$linha[tema]'>
                    </div>
                  </div>
              
                  <div class='row mb-3'>
                    <div class='col-sm-3'>
                      <label class='col-form-label'>Quantidade:</label>
                    </div>
                    <div class='col-sm-9'>
                      <select name='$linha[id_livro]' id='quantidade$linha[id_livro]' onChange='update($linha[id_livro])' class='form-control'>";
                        for($i=0;$i<=$linha['quantidade'];$i++){
                          if($i==0)
                            echo "<option selected value=$i>Escolher...</option>";
                          
                          else
                            echo "<option value=$i>$i</option>";      
                        }
                      echo"</select>
                    </div>
                  </div>

                  <div class='form-group'>
                    <label class=''>Preço Unitário:</label>
                    <input type='text' disabled='' id='precovenda$linha[id_livro]' value='$linha[precovenda]' class='form-control'>
                  </div> 
                  <span id='mostratotalitem$linha[id_livro]' style='display:none;' > 
                    <div class='form-group'>
                      <label class=''>Subtotal:</label>
                      <input type='text' disabled='' id='precototalitem$linha[id_livro]' value='' class='form-control'>
                    </div>
                  </span>
                </div>
            </div>
            <hr class='linha2'>";   
        }
    }
    
    public function livrosConfirmaVenda(){
      $livros = $_SESSION['livroscomprados'];
      foreach($livros as $id_livro => $quantidade) {
        $sql = "SELECT livro.*, editora.nome AS editora,tema.tema,autor.nome FROM livro,editora,tema,autor WHERE    
                livro.id_editora = editora.id_editora AND
                livro.id_autor = autor.id_autor AND
                livro.id_tema = tema.id_tema AND
                id_livro='$id_livro'";
        $resultado = $this->banco->consultar($sql);
        $subtotal = $quantidade*$resultado['precovenda'];

        echo "<hr class='linha2'>   
                <div class='row venda'>
                  <div class='col-sm-5 mb-4 text-center'>
                    <img src='$resultado[foto]' width='150' height='200'>
                  </div>
          
                  <div class='col-sm-7'>
                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Título:</h6></label>
                      <div class='col-sm-10 mb-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$resultado[titulo]'>
                      </div>
                    </div>

                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Ano:</h6></label>
                      <div class='col-sm-10 mb-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$resultado[ano]'>
                      </div>
                    </div>
                    
                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Autor:</h6></label>
                      <div class='col-sm-10 mb-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$resultado[nome]'>
                      </div>
                    </div>

                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Editora:</h6></label>
                      <div class='col-sm-10 mb-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$resultado[editora]'>
                      </div>
                    </div>

                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Tema:</h6></label>
                      <div class='col-sm-10 mb-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$resultado[tema]'>
                      </div>
                    </div>

                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Quantidade vendida:</h6></label>
                      <div class='col-sm-4 mb-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='$quantidade'>
                      </div>
                    </div>

                    <div class='row m-0'>
                      <label for='staticTitilo' class='col-form-label'><h6>Subtotal do item:</h6></label>
                      <div class='col-sm-4'>
                        <input type='text' readonly class='form-control-plaintext' id='staticTitilo' value='R$$subtotal'>
                      </div>
                    </div>
                  </div>
                </div>
              <hr class='linha2'>"; 
      }
    }

    public function cadastraVendaLivro($id_formapagamento,$data,$valortotal){
      $sql = "INSERT INTO venda(id_formapagamento,data,valortotal) VALUES ('$id_formapagamento','$data','$valortotal')";
      $this->banco->executar($sql);
      $id_venda = $this->banco->ultimoId();
      $livrosComprados = $_SESSION['livroscomprados'];

      foreach($livrosComprados as $id_livro => $quantidade_venda){
          $sql = "SELECT precovenda,quantidade from livro WHERE id_livro='$id_livro'";
          $resultado = $this->banco->consultar($sql);
          $valorunitario = $resultado['precovenda'];

          //fazer a SQL para cadastrar valores na tabela venda_livro
          $sql = "INSERT INTO venda_livro(id_livro,id_venda,quantidade_venda,valorunitario) VALUES ('$id_livro','$id_venda','$quantidade_venda','$valorunitario')";
          $this->banco->executar($sql);

          //Calcula estoque
          $saldoEstoque = $resultado['quantidade']-$quantidade_venda;
          $sql = "UPDATE livro SET quantidade = '$saldoEstoque' WHERE id_livro='$id_livro'";
          $this->banco->executar($sql);
      }
      header("Location:../view/sucesso.php?pagina=venda&funcao=Venda");
    }
  }
?>