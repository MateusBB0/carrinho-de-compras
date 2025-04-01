<?php 
session_start();
include "../conexao.php";

if (isset($_POST['submit'])) {

require "dados_user.php";
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];

// dados de sessões
	$_SESSION['id_user'] = $id;
	$_SESSION['nome'] = $nome;
	$_SESSION['senha'] = $senha;
	$_SESSION['email'] = $email;

 // Manipulação do CRUD - Create
 class Crud extends Usuario{
	public function Cadastro(Usuario $c){
		global $conexao
 			$stmt = $conexao->__construct()->prepare("INSERT INTO usuario(nome, senha, email) VALUES(?, ?, ?)");
 			$stmt->bindValue(1, $c->getNome());
 			$stmt->bindValue(2, $c->getSenha());
 			$stmt->bindValue(3, $c->getEmail());
 			$stmt->execute();

 		}
}

 $user = new Usuario(); 
 $user->setNome($nome);
 $user->setSenha($senha);
 $user->setEmail($email);
 $user->setId($id);
 $crud = new Crud();
 $crud->Cadastro($user);

echo "Dados do {$_POST['nome']} cadastrados com sucesso!";
echo "<br>";
echo "<a href='login.php'> Login </a>";
echo "<br>";
echo "<a href='index.php'> Voltar </a>";


}else{
	echo "Dados não cadastrados!!";
}
