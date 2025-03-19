<?php 
require "produto.php";
require "cart.php"; 

session_start();


$cart = new Cart();
$productsInCart = $cart->getCart();

// var_dump($productsInCart);

if (isset($_GET['id'])) {
	$id = strip_tags($_GET['id']);
	$cart->remove($id);
	header('Location: meucarrinho.php');
}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Meu carrinho</title>
 	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@500&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="css/css.css">
 </head>
 <body>
 	 <a href="index.php">Voltar</a>
 	
 		<?php if (count($productsInCart) <= 0)  :?>
 			Nenhum produto no carrinho
 		<?php endif; ?>
 		<?php foreach ($productsInCart as $product): ?>

 			<div class="card">
	 	<div class="top">
	 		<img src="<?php echo $product->getImg();?>" alt="" width="100%" height="150px" title="camisa">
	 	</div>
	 	<div class="bottom">
	 		<hr>
	 	<span id="titulo">

	 	<strong><?php echo $product->getName() ;?></strong>	
	 	</span>
	 	<br>
	 	<div class="button">
	 		<a href=" ?id=<?php echo $row['id']; ?> " >Adicionar<ion-icon name="cart-outline"></ion-icon ></a>

	 		<span id="preco">Subtotal: <br> R$<?php echo number_format($product->getPrice() * $product->getQuantity(), 2,',', '.'); ?></span>
	 		
	 		<a href="?id=<?php echo $product->getId();?>">remove</a>
	 	</div>
	 </div>
		</div>
 		
 			
 		

	 	<?php endforeach;?>
	 	<li>Total: R$ <?php echo number_format($cart->getTotal(), 2,',','.'); ?> </li>
	 
 </body>
 </html>