<?php 
class Conexao{
	public $conn;
	
	public function __construct(){
		if(!isset($this->conn)){
		$conn = new \PDO("mysql:host=localhost;dbname=carrinho;charset=utf8", "root", "");
		}else{
			die("Banco de dados não foi conectado!!");
		}
	return $conn;
	}
 	


}

$conexao = new Conexao();

 ?>