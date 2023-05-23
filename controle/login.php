<?php

    require_once("classes/Usuario.php");

    if(isset($_POST['cpf'])){
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];
        $nome = $_POST["nome"];

        
        $objeto = new Usuario();
        $objeto->login($cpf,$senha);
    }

    if(isset($_GET['sair'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../index.php");   
    }
    function testa_login(){
        session_start();
        if(!isset($_SESSION['nome'])){
            header("Location:../index.php");
        }
    }
?>