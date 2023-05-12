<?php
    require_once ("../banco/Banco.php");
    require_once ("classes/Tema.php");

    if (isset($_POST['id_tema'])) {
        $id_tema = $_POST['id_tema'];
        $tema = $_POST['tema'];

        $objeto = new Tema();
        $objeto->atualizaTema($id_tema,$tema);
    }

    if((isset($_POST['tema']))&&(!isset($_POST['id_tema']))){
        $tema = $_POST['tema'];
        $banco = new Banco();
        $sql = "INSERT INTO tema(tema) VALUES('$tema')";
        $resultado = $banco->executar($sql);
        if($resultado){
            header("Location:../view/sucessocadastro.php?pagina=tema");

        }
        else{
            header("Location:../view/falhacadastro.php?pagina=tema");
        }
    }

    function listar(){
        $tema = new Tema();
        $tema->listarTemas();
    }

    if(isset($_GET['id_tema'])){
        $id_tema = $_GET['id_tema'];
        $tema = new Tema();
        if (isset($_GET['op'])) {
            switch ($_GET['op']) {
                case 'd':
                    $tema->deletaTema($id_tema);
                break;
                
                case 'a':
                    header("Location:../view/form_alteraTema.php?id_tema=$id_tema");
                break;
            }
        }
    }

    function retornaTema($id_tema){
        $tema = new Tema();
        return $tema->getTema($id_tema);
    }

?>