<?php
    require_once("../banco/Banco.php");
    class Usuario{

        public $_SESSION;

        private $nome;
        private $cpf;
        private $senha;
        private $banco;

        public function __construct(){
            $this->banco = new Banco();
        }

        public function login($cpf,$senha){
            $sql = "select*from usuario where cpf='$cpf' and senha='$senha'";
            $resultado = $this->banco->consultar($sql);
            if($resultado){
                session_start();
                $_SESSION['nome'] = $resultado['nome']; 
                header("Location:../view/bem_vindo.php");
            }
            else{
                header("Location:../index.php?falha=true");
            }
        }
    }
?>