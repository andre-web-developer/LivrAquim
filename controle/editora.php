<?php
require_once  ("../banco/Banco.php");
require_once  ("classes/Editora.php");

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];

    $banco = new Banco();

    $sql = "INSERT INTO editora(nome,cnpj,telefone) VALUES('$nome','$cnpj','$telefone')";
    
    if($banco->executar($sql)){
        header("Location:../view/sucessocadastro.php?pagina=editora");
    
    }
    else{
        header("Location:../view/falhacadastro.php");
    }
}

function listar(){
    $tema = new Editora();
    $tema->listarEditora();
}
    

?>