<?php 
require "conexao.php";
require "produto.php";
require "cart.php"; 
require "cart_database.php";

session_start();
$cart = new Cart();
$product = new Product();
$productsInCart = $cart->getCart();
$cartdb = new CartDB();





if (isset($_REQUEST['id'])) {
	$id = strip_tags($_REQUEST['id']);
	$cartdb->RemoveQtdDataBase($_SESSION['id_user'], $id);
	header('Location: meucarrinho_usuario.php');
}

 ?>
 	


 <!DOCTYPE html>
 <html lang="en">
 <head>

 	<title>Meu carrinho</title>
 <?php include "menu.php"; ?> 	 
</head>

	<?php if (isset($_SESSION['id_user'])): ?>
		
	
 <section>

 		<?php $cartdb->SelectProductUser($_SESSION['id_user']);?>
 		<br>
	 
	 </section>
	 <span class="btn btn-light font-weight-bold"><p>Total: R$ <?php number_format($cartdb->setTotalCartDataBase($_SESSION['id_user']), 2,",","." ); 
 ?>	<button type="button" class="badge btn btn-success">Continuar</button></p>
		</span> 
	<?php endif ?>
 </body>
 </html>

