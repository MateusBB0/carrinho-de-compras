<?php 
require 'conexao.php';
require "produto.php";
require "cart.php";
require "cart_database.php";
session_start();

$cart = new Cart();
$cartdb = new CartDB();

$productsInCart = $cart->getCart();

if (isset($_REQUEST['id'])) {
	$id = strip_tags($_REQUEST['id']);
	$cart->additionQtd($id);
	$cartdb->AddQtdDataBase($_SESSION['id_user'], $id);
	// header('Location: meucarrinho_usuario.php');

}else{
	echo "Error";
}



 ?>