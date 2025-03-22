<?php 
require 'conexao.php';
require 'cart.php';
require 'produto.php';
session_start();
	
	// Pegar os dados e colocá-los no loop
	$sql = "SELECT * FROM produtos";
	$stmt = $conexao->__construct()->prepare($sql);
	$stmt->execute();

 
// Pegar o o id quando clicar no botão "add" e peagr seus dados e mandá-los ao meucarrinho.php
if (isset($_GET['id'])) {
		$id = strip_tags($_GET['id']);
			$sql_id = "SELECT * FROM produtos WHERE id = '".$id."' " ;
			$stmt_l = $conexao->__construct()->prepare($sql_id);
			$stmt_l->execute();

			if ($stmt_l->rowCount() > 0) {
				 	while ($itens = $stmt_l->fetch(PDO::FETCH_ASSOC)) {
				 	 $cod = $itens['id'];
					 $name = $itens['nome'];
					 $price = $itens['preco'];
					 $img = $itens['img'];
				 		
				 	}
			}

	$product = new Product();
	$product->setId($cod);
	$product->setName($name);
	$product->setPrice($price);
	$product->setImg($img);
	$product->setQuantity(1);


	 $cart = new Cart();
	 $cart->add($product);

}



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/css.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@500&display=swap" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0&icon_names=shopping_cart" />
	<title>Carrinho de compras</title>
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div class="container-fluid">
		<a href="index.php" class="navbar-brand">
			<span class="material-symbols-outlined" style="color: white;">shopping_cart</span>Carrinho</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Roupas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Celulares</a>
        </li>
    </ul>
    </div>
    <div id="meu_carrinho"> 
    	<a href="meucarrinho.php" style="text-decoration: none;" title="Meu carrinho">
    <span class="material-symbols-outlined">
		shopping_cart
		</span>
	</a>
		</div>
</div>
	</nav>
<h2>Produtos</h2>


<?php if (isset($id)): ?>
<div class='alert alert-success' id="msg">Adicionado ao seu carrinho</div>
<?php endif ?>
	<Section>

		
<?php if ($stmt->rowCount() > 0): ?>
	
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>

	<?php
	$_SESSION['id'] = $row['id'];
	$_SESSION['nome'] = $row['nome'] ; 
	$_SESSION['img'] = $row['img']; 
	$_SESSION['preco'] = $row['preco']; 
	


	 ?>
	<div class="card">
	 	<div class="top">
	 		<img src="<?php echo $row['img'];?>" alt="" width="100%" height="150px" title="camisa">
	 	</div>
	 	<div class="bottom">
	 		<hr>
	 	<span id="titulo">

	 	<strong><?php echo $row['nome']; ?></strong>	
	 	</span>
	 	<br>
	 	<div class="button">
	 		<span id="preco">R$<?php echo number_format($row['preco'], 2,',','.'); ?></span>
	 		
	 		<a href=" ?id=<?php echo $row['id']; ?> " >Adicionar<ion-icon name="cart-outline"></ion-icon ></a>
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
}, 2000);
	
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>