<?php
class CartDB extends Cart{
	public $nome_produto;
	public $preco;
	public $id;
	public $quantidade;
	public $img;

// public function SelectAllProducts(){
	// 	global $conexao;
	// 	$id = strip_tags($_GET['id']);
	// 		$sql_id = "SELECT * FROM produtos WHERE id = '".$id."' " ;
	// 		$stmt_l = $conexao->__construct()->prepare($sql_id);
	// 		$stmt_l->execute();

	// 		if ($stmt_l->rowCount() > 0) {
	// 			 	while ($itens = $stmt_l->fetch(PDO::FETCH_ASSOC)) {
	// 			 	 $cod = $itens['id'];
	// 				 $name = $itens['nome_produto'];
	// 				 $price = $itens['preco'];
	// 				 $img = $itens['img'];		

	// 			 	}

	// 				}
	// }




	public function SelectProductUser($id){
		global $conexao;
		$sql = "SELECT carrinho.id_user, carrinho.quantidade, produtos.* FROM carrinho JOIN produtos ON carrinho.id_produto = produtos.id WHERE id_user = '".$id."' ";
		$stmt = $conexao->__construct()->prepare($sql);
		$stmt->execute();	

		if ($stmt->rowCount() > 0 ) {
			$cartdb_interno = new CartDB();
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
	 	<span class="d-flex justify-content-center"> R$'.number_format($slc['preco'] * $slc['quantidade'], 2, ',', '.') .'</span>
	 </div>
		</div>';
			
		// $nome_produto = $slc['nome_produto'];
		// $preco = $slc['preco'];
		// $id = $slc['id'];
		// $quantidade = $slc['quantidade'];
		// $img = $slc['img'];




			}
		}else{
				echo "Nada Encontrado <br>";
			}


	}



public function AddCartDataBase($product, $userId) {
    global $conexao;

    $id_product = $product->getId();

    // Verifica se já existe
    $check = $conexao->__construct()->prepare("SELECT * FROM carrinho WHERE id_user = ? AND id_produto = ?");
    $check->execute([$userId, $id_product]);

    if ($check->rowCount() > 0) {
        // Atualiza
        $update = $conexao->__construct()->prepare("UPDATE carrinho SET quantidade = quantidade + ?, total = total + ? WHERE id_user = ? AND id_produto = ?");
        $update->execute([
            $product->getQuantity(),
            $product->getPrice() * $product->getQuantity(),
            $userId,
            $id_product
        ]);
    } else {
        // Insere
        $insert = $conexao->__construct()->prepare("INSERT INTO carrinho(id_user, id_produto, nome_produto, quantidade, total) VALUES (?, ?, ?, ?, ?)");
        $insert->execute([
            $userId,
            $product->getId(),
            $product->getName(),
            $product->getQuantity(),
            $product->getPrice() * $product->getQuantity()
        ]);
    }
}





public function AddQtdDataBase($userId, $id){
    global $conexao;

    //Pegar a quantidade e preço atual do carrinho
    $select = "SELECT quantidade, preco FROM carrinho 
               JOIN produtos ON carrinho.id_produto = produtos.id
               WHERE id_user = ? AND id_produto = ?";
    $stmt = $conexao->__construct()->prepare($select);
    $stmt->execute([$userId, $id]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $novaQuantidade = $row['quantidade'] + 1;
        $preco = $row['preco'];
        $novoTotal = $novaQuantidade * $preco;

        // Atualizar no banco dados
        $update = "UPDATE carrinho SET quantidade = ?, total = ? 
                   WHERE id_user = ? AND id_produto = ?";
        $stmtUpdate = $conexao->__construct()->prepare($update);
        $stmtUpdate->execute([$novaQuantidade, $novoTotal, $userId, $id]);
    } else {
        echo "Produto não encontrado no carrinho.";
    }
}



	public function RemoveQtdDataBase($userId, $id){
		global $conexao;
		$select = "SELECT quantidade, preco FROM carrinho 
               JOIN produtos ON carrinho.id_produto = produtos.id
               WHERE id_user = ? AND id_produto = ?";
    $stmt = $conexao->__construct()->prepare($select);
    $stmt->execute([$userId, $id]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $novaQuantidade = $row['quantidade'] - 1;
        $preco = $row['preco'];
        $novoTotal = $novaQuantidade * $preco;

        // Agora sim: atualiza no banco
        $update = "UPDATE carrinho SET quantidade = ?, total = ? 
                   WHERE id_user = ? AND id_produto = ?";
        $stmtUpdate = $conexao->__construct()->prepare($update);
        $stmtUpdate->execute([$novaQuantidade, $novoTotal, $userId, $id]);

        
    } else {
        echo "Produto não encontrado no carrinho.";
    }
if ($novaQuantidade == 0 ) {
        	$sql = "DELETE FROM carrinho WHERE id_user = $userId AND id_produto = $id";
        	$stmt = $conexao->__construct()->prepare($sql);
        	$stmt->execute();
        }

	}


public function setTotalCartDataBase($userId){
	global $conexao;
	$total = 0;
	// Pegar o total do carrinho do usuário no banco de dados
	$select_total = "SELECT carrinho.quantidade, carrinho.total, produtos.* FROM carrinho JOIN produtos ON carrinho.id_produto = produtos.id WHERE id_user = '".$userId."' ";

	$stmt = $conexao->__construct()->prepare($select_total);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$preco_total += $row['total'];
		}

	}
	echo $preco_total;
}



}






	

	