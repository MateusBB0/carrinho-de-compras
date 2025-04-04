<?php 
class Cart{

	public function __construct(){
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = [
				'products' => [],
				'total' => 0
			];
		}
	}

	public function add(Product $product){

		$inCart = false;
		$this->setTotal($product);
		if (count($this->getCart()) > 0){

			// Mostrando os produtos no carrinho
		foreach ($this->getCart() as $productInCart){

		if ($productInCart->getId() == $product->getId() ) {
			$quantity = $productInCart->getQuantity() + $product->getQuantity();
			// Alterando a quantidade
			$productInCart->setQuantity($quantity);
			$inCart = true;
			break;
			}


				}


		}

		if(!$inCart){
			$this->setProductsInCart($product);
		}

	}

	private function setProductsInCart($product){
		$_SESSION['cart']['products'][] = $product;
	}

	private function setTotal(Product $product){
		$_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
	}

	public function remove(int $id){
		if (isset($_SESSION['cart']['products'])) {
			foreach ($this->getCart() as $index =>$product) {

				if ($product->getId() === $id) {
					$product->setQuantity($product->getQuantity() - 1);

					if ($product->getQuantity() <= 0) {
						unset($_SESSION['cart']['products'][$index]);
					}

					$_SESSION['cart']['total'] -= $product->getPrice();
				
				}
			}
		}
}
// Adicionando mais do que um item igual dentro da página meucarrinho.php
public function additionQtd(int $id){
		if (isset($_SESSION['cart']['products'])) {
		foreach ($this->getCart() as $index =>$product) {

			if ($product->getId() === $id) {
				$product->setQuantity($product->getQuantity() + 1);


				$_SESSION['cart']['total'] += $product->getPrice();
				
				}
			}
		}
}

public function getCart(){
	return $_SESSION['cart']['products'] ?? [];
}

public function getTotal(){
	return $_SESSION['cart']['total'] ?? 0;
}

}


 ?>