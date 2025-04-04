<?php 
require 'conexao.php';
require 'cart.php';
require 'produto.php';
session_start();
	
	// Pegar os dados e colocá-los no loop
	$sql = "SELECT * FROM produtos";
	$stmt = $conexao->__construct()->prepare($sql);
	$stmt->execute();

 
// Pegar o o id quando clicar no botão "add" e pegar seus dados e mandá-los ao meucarrinho.php
	if (isset($_GET['id']) ) {
if (isset($_SESSION['id_user']) ) {



		$id = strip_tags($_GET['id']);
			$sql_id = "SELECT * FROM produtos WHERE id = '".$id."' " ;
			$stmt_l = $conexao->__construct()->prepare($sql_id);
			$stmt_l->execute();

			if ($stmt_l->rowCount() > 0) {
				 	while ($itens = $stmt_l->fetch(PDO::FETCH_ASSOC)) {
				 	 $cod = $itens['id'];
					 $name = $itens['nome_produto'];
					 $price = $itens['preco'];
					 $img = $itens['img'];
				 		
				 	}

					}
				
			

	$product = new Product();
	error_reporting(0);
	$product->setId($cod);
	$product->setName($name);
	$product->setPrice($price);
	$product->setImg($img);
	$product->setQuantity(1);


	 $cart = new Cart();
	 $cart->add($product);
}else{
	echo 
	'<div class="alert alert-warning" role="alert" id="msg">
  Cadastre-se antes de colocar as compras no carrinho!!
	</div>';
	}
		}

 ?>
<!DOCTYPE html>
<html lang="en">
<title>Carrinho de compras</title>

<?php include "menu.php"; ?>


<h2>Produtos</h2>

<?php // echo $_SESSION['nome']; ?>

<?php if (isset($id)): ?>
<div class='alert alert-success' id="msg">Adicionado ao seu carrinho</div>
<?php endif ?>
	<Section>

		
<?php if ($stmt->rowCount() > 0): ?>
	
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>

	<?php
	$_SESSION['id'] = $row['id'];
	$_SESSION['nome_produto'] = $row['nome_produto'] ; 
	$_SESSION['img'] = $row['img']; 
	$_SESSION['preco'] = $row['preco']; 
	


	 ?>

	<div class="card_compra card">
	 	<div class="top">
	 		<img src="<?php echo $row['img'];?>" alt="" width="100%" height="150px" title="camisa">
	 	</div>
	 	<div class="bottom">
	 		<hr>
	 	<span id="titulo">

	 	<strong><?php echo $row['nome_produto']; ?></strong>	
	 	</span>
	 	<br>
	 	<div class="button">
	 		<span id="preco">R$<?php echo number_format($row['preco'], 2,',','.'); ?></span>
	 		
	 		<a href=" ?id=<?php 
	 		if (isset($_SESSION['id_user'])){
	 		
	 		 echo $row['id'];
	 		} 
	 		?>" 
	 		 >Adicionar<ion-icon name="cart-outline"></ion-icon ></a>
	 	</div>
	 </div>
	</div>

<?php endwhile ?>

<?php endif; ?>

	
</Section>


</body>
<script>

		setTimeout(function() {
    document.getElementById('msg').style.display = 'none';
}, 500);
	
</script>

</html>