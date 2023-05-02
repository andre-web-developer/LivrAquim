<?php

require_once ("../banco/Banco.php");

function mostrarProdutos(){
    $banco = new Banco();

    $sql = "select*from livro";

    $resultado = $banco->consultar($sql);
    while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<img src='$linha[foto]' width='150' height='150'><br>";
        echo "ISBN: $linha[isbn] <br>";
        echo "Título: $linha[titulo] <br>";
        echo "Quantidade: <select name= '$linha[id_livro]' id='quantidade$linha[id_livro]' onChange='update($linha[id_livro])'>";
                    for($i=0;$i<=$linha['quantidade'];$i++){
                        if($i==0)
                            echo "<option value=$i>-</option>";
                        
                        else
                          echo"<option value=$i>$i</option>";      
                    }
                    echo "</select> <br>";
        
        echo "Preço Unitário: <input type='text' disabled='' id='precovenda$linha[id_livro]' value='$linha[precovenda]'><br>
        <span id='mostratotalitem$linha[id_livro]' style='display:none;' > Subtotal:<input type='text' disabled='' id='precototalitem$linha[id_livro]' value=''></span><br>";   
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

        echo "Foto livro: <img src='$resultado[foto]' width='150' height='150'><br>";
        echo "ISBN: $resultado[isbn] <br>";
        echo "Título: $resultado[titulo] <br>";
        echo "Quantidade vendida: $quantidade <br>";
        echo "Subtotal do item:". $quantidade*$resultado['precovenda'];
        echo "<br><br>";
            
    }
echo "Preço total da compra: - ".$_SESSION['precoprevio'];
}
    
?>