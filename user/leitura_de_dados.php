<?php 
session_start();
require "../conexao.php";
require "dados_user.php";
if (isset($_POST['submit']) || isset($_GET['id_user'])) {
	// Pegar o nome e a senha do usuário via login ou voltando para a página de dados
	error_reporting(0);
	$nome = isset($_POST['nome']) ? $_POST['nome'] : $_SESSION['nome'];
	$senha = isset($_POST['senha']) ? $_POST['senha'] : $_SESSION['senha'];




// Manipulação do CRUD - Read
class Login extends Usuario{

		public function read(){
			global $nome, $senha, $conexao;

			if (isset($_POST['senha'])) {
				// Se o usuário efetuou o login
				$sql = "SELECT * FROM usuario WHERE nome = '".$nome."' AND senha = '".$senha."' ";
			}else{
				// Se o usuário voltou para a página
				error_reporting(0);
				$id = $_SESSION['id_user'];
				$sql = "SELECT * FROM usuario WHERE id_user = '".$id."' ";
			 }

			$stmt = $conexao->__construct()->prepare($sql);
			$stmt->execute();
			

		if ($stmt->rowCount() > 0) {
		        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		        	echo $row['id_user']. "<br>";
		        	echo $row['nome']. "<br>";
		        	echo $row['senha']. "<br>";
		        	echo $row['email']. "<br><br>";
		 		echo "<a href='../index.php'>Página Pricipal</a><br><br>";
		 		echo "<a href='sair.php'>Sair</a><br><br>";

				echo "<a href='editar_dados.php?id_user=". $row['id_user']."  '>Editar</a><br><br>";
				echo "<a href='deletar.php?id=".$row['id_user']."' style= 'color:red;'>Excluir</a><br><br>";

				// Pegar os valores do row e igualá-los às sessions


				$_SESSION['id_user'] = $row['id_user']; 
				$_SESSION['nome'] = $row['nome'];	
 				$_SESSION['senha'] = $row['senha'];
				$_SESSION['email'] = $row['email'];
 				
 					}
			}else{

				include "../menu.php";
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 			<center>Dados inválidos ou inexistentes</center>
					</div> <br><br>
';
				echo "	<div style='display:flex;justify-content: space-around;align-items: center;'>				<a href='login.php' class='btn btn-primary' style='font-size:20px;'>Voltar</a><br><br>";
		 		echo "<a href='sair.php' class='btn btn-success' style='font-size:20px;'><ion-icon name='log-out-outline' 'style=width:10px;'></ion-icon>Sair </a><br><br>	
		 				</div>";

			}

		}
}

 $user = new Usuario(); 
 $user->setNome($nome);
 $user->setSenha($senha);
 $login = new Login();
 $login->read();
 

} else{
	echo "Usuário não está logado";
}