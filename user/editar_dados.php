<?php
session_start();
$id = $_GET['id_user'];

$_SESSION['id_user']= $id;

$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar dados</title>
</head>
<style>
	label{
		display: flex;
		margin-top: 10px;
	}

</style>
<body>
	<form action="mudar_dados.php" method="POST">
		<label for="">Nome: <input type="text" name="nome" value="<?php echo $nome;?>" required></label>
		<label for="">Senha: <input type="password" name="senha"  value="<?php echo $senha;?>"required></label>
		<label for="">Email: <input type="email" name="email"  value="<?php echo $email;?>"required></label>

		<label for=""><input type="submit" name="submit"></label><br>
		<a href="<?php echo'leitura_de_dados.php?id_user="'.$id.'"';?>">Voltar</a><br><br>
	</form>
	
</body>
</html>
