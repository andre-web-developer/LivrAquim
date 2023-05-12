<?php
require_once  ("../banco/Banco.php");
require_once  ("classes/Editora.php");

if (isset($_POST['id_editora'])) {
    $id_editora = $_POST['id_editora'];
    $editora = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];

    $objeto = new Editora();
    $objeto->atualizaEditora($id_editora,$editora,$cnpj,$telefone);
}

if((isset($_POST['nome']))&&(!isset($_POST['id_editora']))){
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];

    $banco = new Banco();

    $sql = "INSERT INTO editora(nome,cnpj,telefone) VALUES('$nome','$cnpj','$telefone')";
    
    if($banco->executar($sql)){
        header("Location:../view/sucessocadastro.php?pagina=editora");
    
    }
    else{
        header("Location:../view/falhacadastro.php?pagina=editora");
    }
}

function listar(){
    $editora = new Editora();
    $editora->listarEditora();
}

if(isset($_GET['id_editora'])){
    $id_editora = $_GET['id_editora'];
    $editora = new Editora();
    if (isset($_GET['op'])) {
        switch ($_GET['op']) {
            case 'd':
                $editora->deletaEditora($id_editora);
            break;
            
            case 'a':
                header("Location:../view/form_alteraEditora.php?id_editora=$id_editora");
            break;
        }
    }
}   

function retornaEditora($id_editora){
    $editora = new Editora();
    return $editora->getEditora($id_editora);
}
?>