<?php 
 class Usuario{
 		public $nome;
 		private $senha;
 		private $email;
 		private $id;

 		public function getId(){
		return $this->id;
		}
		public function setId($i){
		$this->id = $i;
		}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($n){
		$this->nome = $n;
	}
	public function getSenha(){
 			return $this->senha;
 		}

 	public function	setSenha($s){
 		$this->senha = $s;

 		}

 		public function getEmail(){
 			return $this->email;
 		}

 		public function setEmail($e){
 		$email = filter_var($e,FILTER_SANITIZE_EMAIL);
 		$this->email = $email;

 		}


	
 }




 ?>