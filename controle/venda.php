<?php

require_once ("classes/Venda.php");

    function mostrarProdutos(){
        $objeto = new Venda();             
        $objeto->livrosVenda();             
    }

    if(isset($_POST['precoprevio'])){
        foreach($_POST as $id_livro => $quantidade){
            if(($quantidade!=0)&&($id_livro!="precoprevio")){
                $livros[$id_livro] = $quantidade;
            }

            session_start();
            $_SESSION['livroscomprados'] = $livros;
            $descontoPorcento = $_POST['precoprevio'] * 0.05;
            $_SESSION['precoprevio'] = $_POST['precoprevio'] - $descontoPorcento;
        }
        header("Location:../view/confirmavenda.php");
    }

    function mostrarCompra(){
        $objeto = new Venda();             
        $objeto->livrosConfirmaVenda();
    }

    if (isset($_POST['pagamento'])) {
        $id_formapagamento = $_POST['pagamento'];
        $data = date("Y-m-d");
        session_start();
        $valortotal = $_SESSION['precoprevio'];
        
        $objeto = new Venda();             
        $objeto->cadastraVendaLivro($id_formapagamento,$data,$valortotal);
    }
    
?>