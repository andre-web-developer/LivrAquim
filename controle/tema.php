<?php
    require_once ("../banco/Banco.php");
    require_once ("classes/Tema.php");

    if (isset($_POST['id_tema'])) {
        $id_tema = $_POST['id_tema'];
        $tema = $_POST['tema'];

        $objeto = new Tema();
        $objeto->atualizaTema($id_tema,$tema);
    }elseif((isset($_POST['tema']))&&(!isset($_POST['id_tema']))){
        $tema = $_POST['tema'];

        $objeto = new Tema();
        $objeto->cadastrar($tema);
    }

    function listar(){
        $objeto = new Tema();
        $objeto->listarTemas();
    }

    if(isset($_GET['id_tema'])){
        $id_tema = $_GET['id_tema'];
        $objeto = new Tema();
        if (isset($_GET['op'])) {
            switch ($_GET['op']) {
                case 'd':
                    $objeto->deletaTema($id_tema);
                break;
                
                case 'a':
                    header("Location:../view/form_alteraTema.php?id_tema=$id_tema");
                break;
            }
        }
    }

    function retornaTema($id_tema){
        $objeto = new Tema();
        return $objeto->getTema($id_tema);
    }
?>