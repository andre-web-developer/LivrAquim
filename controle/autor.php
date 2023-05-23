<?php
    require_once ("classes/Autor.php"); 

    if (isset($_POST['id_autor'])) {
        $id_autor = $_POST['id_autor'];
        $autor = $_POST['nome'];

        $objeto = new Autor();
        $objeto->atualizaAutor($id_autor,$autor);
    }elseif((isset($_POST['nome'])&&(!isset($_POST['id_autor'])))){
        $nome = $_POST['nome'];
        
        $objeto = new Autor();
        $objeto->cadastrar($nome);
    }

    function listar(){
        $autor = new Autor();
        $autor->listarAutor();
    }

    if(isset($_GET['id_autor'])){
        $id_autor = $_GET['id_autor'];
        $autor = new Autor();
        if (isset($_GET['op'])) {
            switch ($_GET['op']) {
                case 'd':
                    $autor->deletaAutor($id_autor);
                break;
                
                case 'a':
                    header("Location:../view/form_alteraAutor.php?id_autor=$id_autor");
                break;
            }
        }
    }

    function retornaAutor($id_autor){
        $autor = new Autor();
        return $autor->getNome($id_autor);
    }
?>