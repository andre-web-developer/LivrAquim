<?php

class Banco extends PDO{

    public $base;
    public $conex;

    public function __construct(){
        $this->conex = new PDO('mysql:host=localhost;dbname=livraria',"root","");
    }

    public function executar($sql){
		//usada geralmente para inserir dados
		if($this->conex->query($sql)){
			return true;
		}
        else{
			return false;
		}
	}

    public function consultar($sql){
		//usada quando preciso pegar as informações das linhas das tabelas
		$resultado=$this->conex->query($sql);
		$num_linhas=$resultado->rowCount();
		if($num_linhas==1){
			return $resultado->fetch(PDO::FETCH_ASSOC);
		}
        elseif($num_linhas>1){
			return $resultado;
		}
		else{
			return false;
		}
	}

	public function ultimoId(){
		return $this->conex->lastInsertId();
	}
}
?>