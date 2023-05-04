<?php
require_once ("../banco/Banco.php");

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
}

$banco = new Banco();

$sql = "INSERT INTO autor(nome) VALUES('$nome')";

if($banco->executar($sql)){
    header("Location:../view/sucessocadastro.php");

}
else{
    header("Location:../view/falhacadastro.php");
}



?>