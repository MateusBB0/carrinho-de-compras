<?php 
require "../conexao.php";
require "dados_user.php";

$idd = $_GET['id'];


class Deletar extends Usuario{

public function delete($id){
	global $conexao;
	$sql = "DELETE FROM usuario WHERE id = ?";
	$stmt = $conexao->__construct()->prepare($sql);
	$stmt->bindValue(1, $id);
	$stmt->execute();
	header("Location: index.php");

}
}

 $user = new Usuario();
 $deletar = new Deletar();
 $deletar->delete($idd);





 ?>