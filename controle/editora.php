<?php

    require_once  ("classes/Editora.php");

    if (isset($_POST['id_editora'])) {
        $id_editora = $_POST['id_editora'];
        $editora = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];

        $objeto = new Editora();
        $objeto->atualizaEditora($id_editora,$editora,$cnpj,$telefone);
    }elseif((isset($_POST['nome']))&&(!isset($_POST['id_editora']))){
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];

        $objeto = new Editora();
        $objeto->cadastrar($nome,$cnpj,$telefone);
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