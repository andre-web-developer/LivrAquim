<?php

    require_once("../banco/Banco.php");
    require_once("classes/Usuario.php");

    if(isset($_POST['login'])){
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $banco = new Banco();

        $sql = "select*from usuario where login='$login' and senha='$senha'";
        
        $resultado = $banco->consultar($sql);

        if($resultado){
            $usuario = new Usuario($resultado['nome'],$resultado['login'],$resultado['senha']);
            $usuario->logar();
        }
        else{
            echo "deu ruim";
            return false;
        }

    }
    if(isset($_GET['sair'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../index2.php");   
    }
    function testa_login(){
        session_start();
        if(!isset($_SESSION['nome']))
            header("Location:../index2.php");
    }
?>