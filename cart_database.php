<?php

class CartDB extends Cart
{
	
	public function SelectProductUser($id){
		global $conexao;
		$sql = "SELECT carrinho.id_user, carrinho.quantidade, produtos.* FROM carrinho JOIN produtos ON carrinho.id_produto = produtos.id WHERE id_user = '".$id."' ";
		$stmt = $conexao->__construct()->prepare($sql);
		$stmt->execute();	

		if ($stmt->rowCount() > 0 ) {
			while ($slc = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="card" style="margin-left: 10px;margin-top:10px;width: 160px;">
	 	<div class="top">
	 		<img src="'.$slc['img'].'" alt="" width="100%" height="150px" title="camisa">
	 	</div>
	 	<div class="bottom_compra">
	 		<hr>
	 	<span id="titulo">
	 	<strong>'. $slc['nome_produto'].'</strong>	
	 	</span>
	 	<br>
	 	<div class="btn-group d-flex justify-content-center" style="width:60%; position: relative; left: 20%;">

	 	<a href="adicionando_itens.php?id='.$slc['id'].'" class="btn btn-success btn-lg p-1">+</a>

		<input class="p-2" type="button" value="'.$slc['quantidade'].'" >	 		
	 		
	 	<a href="?id='.$slc['id'].'"class="btn btn-success btn-lg p-1">-</a>
	

	 	</div>
	 	<span class="d-flex justify-content-center"> R$'.number_format($slc['preco'], 2, ',', '.') .'</span>
	 </div>
		</div>';
		// $totalcartdb = ;
			}
		}else{
				echo "Nada Encontrado <br>";
			}


	}



public function AddCartDataBase($id_product, $userId){
		if (!isset($_SESSION['cart']['products']) || empty($_SESSION['cart']['products'])) {
        return;
    }
		global $conexao;
		$userId = $_SESSION['id_user'];

		if (isset($userId)) {

			$stmt = $conexao->__construct()->prepare("INSERT INTO carrinho(id_user, id_produto,nome_produto, quantidade, total) VALUES(?, ?, ?, ?, ?)");

 			 foreach ($_SESSION['cart']['products'] as $product) {
        	$stmt->execute([
            $userId,
            $product->getId(),
            $product->getName(),
            $product->getQuantity(),
            $product->getPrice() * $product->getQuantity()]);
    			}
		}
	}
// Adicionar o Item no banco de dados
	public function AddQtdDataBase($userId, $id){
		global $conexao, $product;
		$update = "UPDATE carrinho SET quantidade = ?, total = ?  WHERE id_user = $userId AND id_produto = $id";
	$stmt = $conexao->__construct()->prepare($update);
		foreach ($_SESSION['cart']['products'] as $product) {
        	$stmt->execute([
            $product->getQuantity(),
            $product->getPrice() * $product->getQuantity()]);
    			}
		}

		

	public function RemoveQtdDataBase(){
		
	}

}

