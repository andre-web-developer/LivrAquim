<?php
require_once ("../banco/Banco.php");
require_once ("classes/Autor.php"); 



if(isset($_GET['id_autor'])){
    $id_autor = $_GET['id_autor'];
    $autor = new Autor();
    if($_GET['op']=='d'){
        $autor->deletaAutor();
    }
    else{
        $autor->alteraAutor();
    }
}

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $banco = new Banco();
    
    $sql = "INSERT INTO autor(nome) VALUES('$nome')";
    
    if($banco->executar($sql)){
        header("Location:../view/sucessocadastro.php?pagina=autor");
    
    }
    else{
        header("Location:../view/falhacadastro.php");
    }
}


function listar(){
    $autor = new Autor();
    $autor->listarAutor();
}

?>