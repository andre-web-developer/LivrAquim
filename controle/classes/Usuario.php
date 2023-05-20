<?php

class Usuario{

        public $_SESSION;

        private $nome;
        private $login;
        private $senha;

        public function __construct($nome,$login,$senha){
            $this->nome=$nome;
            $this->login=$login;
            $this->senha=$senha;
        }

        public function logar(){
             //criar a sessão
            session_start();
            $_SESSION['nome']=$this->nome; 
            header("Location:../view/bem_vindo.php");
        }

        public function testaLogin(){
                session_start();
                if(isset($_SESSION['nome'])){
                    return true;
                }           
                else{
                    return false;
                }
        }
}

?>