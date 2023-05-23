<?php

    require_once  ("classes/Livro.php");
    require_once  ("classes/Tema.php");
    require_once  ("classes/Autor.php");
    require_once  ("classes/Editora.php");

    if (isset($_POST['id_livro'])) {
        $id_livro = $_POST['id_livro'];
        $isbn = $_POST['isbn'];
        $titulo = $_POST['titulo'];
        $ano = $_POST['ano'];
        $id_autor = $_POST['id_autor'];
        $id_tema = $_POST['id_tema'];
        $id_editora = $_POST['id_editora'];
        $precocompra = $_POST['precocompra'];
        $precovenda = $_POST['precovenda'];
        $quantidade = $_POST['quantidade'];
        $foto = $_FILES['foto'];
        $nomeaequivo = $foto['name'];

        //conversão dos valores para banco
        $precocompra = floatval($precocompra);
        $precovenda = floatval($precovenda);
        //caso mude seria esse caso não mude seria apenas o nome do arquivo COMO FAZER?
        $pasta = '../img/capas/';
        $caminhocompleto = $pasta.basename($nomeaequivo);
        move_uploaded_file($foto['tmp_name'], $caminhocompleto);
    
        $livro = new Livro();
        $livro->atualizaLivro($id_livro,$isbn,$titulo,$ano,$quantidade,$precovenda,$precocompra,$caminhocompleto,$id_editora,$id_tema,$id_autor);
    }elseif ((isset($_POST['isbn']))&&(!isset($_POST['id_livro']))){
        $isbn = $_POST['isbn'];
        $titulo = $_POST['titulo'];
        $ano = $_POST['ano'];
        $id_autor = $_POST['id_autor'];
        $id_tema = $_POST['id_tema'];
        $id_editora = $_POST['id_editora'];
        $precocompra = $_POST['precocompra'];
        $precovenda = $_POST['precovenda'];
        $quantidade = $_POST['quantidade'];
        $foto = $_FILES['foto'];
        $nomeaequivo = $foto['name'];

        //conversão dos valores para banco
        $precocompra = floatval($precocompra);
        $precovenda = floatval($precovenda);

        $pasta = '../img/capas/';
        $caminhocompleto = $pasta.basename($nomeaequivo);
        move_uploaded_file($foto['tmp_name'], $caminhocompleto);

        $livro = new Livro();
        $livro->cadastrar($isbn,$titulo,$ano,$id_autor,$id_tema,$id_editora,$precocompra,$precovenda,$quantidade,$caminhocompleto);
    }

    function mostrarAutor(){
        $autor = new Autor();
        $autor->mostrar();             
    }

    function mostrarTemas(){
        $tema = new Tema();
        $tema->mostrar();
    }

    function mostrarEditoras(){
        $editora = new Editora();
        $editora->mostrar();
    }

    function listar(){
        $livro = new Livro();
        $livro->listarLivro();
    }

    if((isset($_GET['id_livro']))&&(isset($_GET['op']))){
        $id_livro = $_GET['id_livro'];
        $livro = new Livro();
        switch ($_GET['op']) {
            case 'd':
                $livro->deletaLivro($id_livro);
            break;
            
            case 'a':
                header("Location:../view/form_alteraLivro.php?id_livro=$id_livro");
            break;
        }
    }
    function retornaLivro($id_livro){
        $livro = new Livro();
        return $livro->getLivro($id_livro);
    }
?>