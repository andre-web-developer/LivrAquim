<?php

class Banco extends PDO{

    public $base;
    public $conex;

    public function __construct(){
			$this->conex = new PDO('mysql:host=localhost;dbname=livraria',"root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function executar($sql){
		//usada geralmente para inserir ou deletar dados
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
			//perguntar como isso funciona e PQ
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

	public function deletar($sql){
		try{
			//tenta executar a SQL e catch fica esperando pelo erro
			$this->conex->query($sql);
			return true;
		} catch (PDOException) {
			return false;
		}
	}
}
?>