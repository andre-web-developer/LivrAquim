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
            $sql = "SELECT * FROM usuario WHERE cpf='$cpf' AND senha='$senha'";
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
        
        public function esquecer($cpf,$senha){
            $sql = "UPDATE usuario SET senha='$senha' where cpf='$cpf'";
            $resultado = $this->banco->consultar($sql);
            if($resultado){ 
                header("Location:../index.php?recuperacao=true");
            }
            else{
                header("Location:../index.php?recuperacao=false");
            }
        }
    }
?>