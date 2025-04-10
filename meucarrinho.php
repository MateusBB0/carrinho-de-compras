<?php 
require "conexao.php";
require "produto.php";
require "cart.php"; 

session_start();
$cart = new Cart();
$productsInCart = $cart->getCart();

if (isset($_REQUEST['id'])) {
	$id = strip_tags($_REQUEST['id']);
	$cart->remove($id);
	header('Location: meucarrinho.php');
}

 ?>
 <?php if (isset($_SESSION['id_user'])): ?>
 	

 <!DOCTYPE html>
 <html lang="en">
 <head>

 	<title>Meu carrinho</title>
 <?php include "menu.php"; ?> 	 
</head>


 <section>
 		<?php if (count($productsInCart) <= 0)  :?>
 			Nenhum produto no carrinho
 		<?php endif; ?>
 		<?php foreach ($productsInCart as $product): ?>

 			<div class="card" style="margin-left: 10px;margin-top:10px;width: 160px;">
	 	<div class="top">
	 		<img src="<?php echo $product->getImg();?>" alt="" width="100%" height="150px" title="camisa">
	 	</div>
	 	<div class="bottom_compra">
	 		<hr>
	 	<span id="titulo">

	 	<strong><?php echo $product->getName() ;?></strong>	
	 	</span>
	 	<br>
	 	<div class="btn-group d-flex justify-content-center" style="width:60%; position: relative; left: 20%;">

	 	<a href="adicionando_itens.php?id=<?php echo $product->getId(); ?>"class="btn btn-success btn-lg p-1">+</a>

		<input class="p-2" type="button" value="<?php echo $product->getQuantity(); ?>" >	 		
	 		
	 	<a href="?id=<?php echo $product->getId(); ?>"class="btn btn-success btn-lg p-1">-</a>
	

	 	</div>
	 	<span class="d-flex justify-content-center"> R$<?php echo number_format($product->getPrice() * $product->getQuantity(), 2,',', '.'); ?></span>
	 </div>
		</div>
 		
 		
	 	<?php endforeach;?>
</section>
	<br>
	 	<span class="btn btn-light font-weight-bold"><p>Total: R$ <?php echo number_format($cart->getTotal(), 2,',','.'); ?> <button type="button" class="badge btn btn-success">Continuar</button></p>
		</span>
	 
 </body>
 </html>
  <?php endif ?>