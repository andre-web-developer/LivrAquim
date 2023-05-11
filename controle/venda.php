<?php

require_once ("../banco/Banco.php");

function mostrarProdutos(){
    $banco = new Banco();

    $sql = "select*from livro";

    $resultado = $banco->consultar($sql);
    while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        //preciso colocar os itens numa dive completa fora da imagem para conseguir jogar tudo por lado dela!!!
    echo"   <div class='form-group'>
                <img src='../$linha[foto]' width='150' height='200px'>
                <div class=''>
                    <div class='form-group row'>
                        <label for='staticEmail' class='col-sm-2 col-form-label'>ISBN:</label>
                        <div class='col-sm-10'>
                            <input type='text' readonly class='form-control-plaintext' id='staticEmail' value='$linha[isbn]'>
                        </div>
                    </div>
                    
                    <div class='form-group row'>
                        <label for='staticEmail' class='col-sm-2 col-form-label'>Título:</label>
                        <div class='col-sm-10'>
                            <input type='text' readonly class='form-control-plaintext' id='staticEmail' value='$linha[titulo]'>
                        </div>
                    </div>

                        <div class='form-group col-md-4'>
                            <label>Quantidade:</label>
                            <select name='$linha[id_livro]' id='quantidade$linha[id_livro]' onChange='update($linha[id_livro])' class='form-control'>
                                <option selected>Escolher...</option>";
                                for($i=0;$i<=$linha['quantidade'];$i++){
                                    if($i==0)
                                        echo "<option value=$i>-</option>";
                                    
                                    else
                                        echo "<option value=$i>$i</option>";      
                                }
                        echo"</select>
                        </div>

                            <div class='form-group'>
                                <label>Preço Unitário:</label>
                                <input type='text' disabled='' id='precovenda$linha[id_livro]' value='$linha[precovenda]' class='form-control'>
                            </div> 
                            <span id='mostratotalitem$linha[id_livro]' style='display:none;' > 
                                <div class='form-group'>
                                    <label>Subtotal:</label>
                                    <input type='text' disabled='' id='precototalitem$linha[id_livro]' value='' class='form-control'>
                                </div>
                            </span><br>
                </div>
            </div>";   
        }             
}
if(isset($_POST['precoprevio'])){
    foreach($_POST as $id_livro => $quantidade){
        if(($quantidade!=0)&&($id_livro!="precoprevio")){
            $livros[$id_livro] = $quantidade;
        }

        session_start();
        $_SESSION['livroscomprados'] = $livros;
        $_SESSION['precoprevio'] = $_POST['precoprevio'];
    }
    header("Location:../view/confirmavenda.php");
}

function mostrarCompra(){
    $banco = new Banco();

    $livros = $_SESSION['livroscomprados'];
    foreach($livros as $id_livro => $quantidade) {
        $sql = "select*from livro where id_livro='$id_livro'";
        $resultado = $banco->consultar($sql);

        echo "Foto livro: <img src='../$resultado[foto]' width='150' height='150'><br>";
        echo "ISBN: $resultado[isbn] <br>";
        echo "Título: $resultado[titulo] <br>";
        echo "Quantidade vendida: $quantidade <br>";
        echo "Subtotal do item:". $quantidade*$resultado['precovenda'];
        echo "<br><br>";
            
    }
    echo "Preço total da compra: ".$_SESSION['precoprevio'];
}

if (isset($_POST['pagamento'])) {
    $id_formapagamento = $_POST['pagamento'];
    
    $dia = date("d")-1;//recebo dia com a date function e diminuo 1, fuso errado
    $data = date("Y-m-");//recebe ano e mes
    $data = $data.'-'.$dia;//concatena tudo

    session_start();
    $valortotal = $_SESSION['precoprevio'];

    //criar instância do banco
    $banco = new Banco();
    $sql = "INSERT INTO venda(id_formapagamento,data,valortotal) VALUES ('$id_formapagamento','$data','$valortotal')";
    $banco->executar($sql);
    
    //#################################### Cadastrando na tabela venda_livro ########################################
    $id_venda = $banco->ultimoId();
    
    $livrosComprados = $_SESSION['livroscomprados'];
    
    foreach($livrosComprados as $id_livro => $quantidade_venda){
        $sql = "SELECT precovenda,quantidade from livro WHERE id_livro='$id_livro'";
        $resultado = $banco->consultar($sql);
        $valorunitario = $resultado['precovenda'];

        //fazer a SQL para cadastrar valores na tabela venda_livro
        $sql = "INSERT INTO venda_livro(id_livro,id_venda,quantidade_venda,valorunitario) VALUES ('$id_livro','$id_venda','$quantidade_venda','$valorunitario')";
        $banco->executar($sql);

        //Calcula estoque
        $saldoEstoque = $resultado['quantidade']-$quantidade_venda;
        $sql = "UPDATE livro SET quantidade = '$saldoEstoque' WHERE id_livro='$id_livro'";
        $banco->executar($sql);
    }
    
    header("Location:../view/sucessocadastro.php?pagina=venda");
}
    
?>