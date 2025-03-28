<?php
session_start();
require "../conexao.php";

if (isset($_POST['submit'])) {

	

	require "dados_user.php";
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	$id = $_SESSION['id'];

class MudarDados extends Usuario{

	public function update(Usuario $u){
		global $id, $conexao;
		$sql = "UPDATE usuario SET nome = ?, senha = ?, email = ? WHERE id = $id";
		$stmt =$conexao->__construct()->prepare($sql);
		$stmt->bindValue(1, $u->getNome());
		$stmt->bindValue(2, $u->getSenha());
		$stmt->bindValue(3, $u->getEmail());
		$stmt->execute();

		echo "Dados modificados com sucesso!<br>";
		echo"<a href='leitura_de_dados.php?id={$id}'>Voltar</a>";
	}

}

 $user = new Usuario(); 
 $user->setNome($nome);
 $user->setSenha($senha);
 $user->setEmail($email);
 $user->setId($id);
 $mudar = new MudarDados();
 $mudar->update($user);


}else{
	echo "ERRO";
	echo "<a href='index.php?id=$id'>Voltar</a><br><br>";
	echo "<a href='sair.php'>sair</a><br><br>";
}


?>