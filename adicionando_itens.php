<?php 
require 'conexao.php';
require "produto.php";
require "cart.php";


$cart = new Cart();
$productsInCart = $cart->getCart();

if (isset($_REQUEST['id'])) {
	$id = strip_tags($_REQUEST['id']);
	$cart->additionQtd($id);
	header('Location: meucarrinho.php');

}else{
	echo "Error";
}



 ?>