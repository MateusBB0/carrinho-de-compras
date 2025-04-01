<!DOCTYPE html>
<html lang="en" style="background-color: #000;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/usuario.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@500&display=swap" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0&icon_names=shopping_cart" />

	<title>Login</title>
</head>
<style type="text/css">
	label{
		display: block;
		margin-top: 10px;
	}
</style>
<body>
	<div class="card card_user">
		<div class="img_user"><img src="../img/user_image.png" alt="" width="70px" height="70px"></div>
		
			<div class="card-body">
				<div class="card-title">
					<h2><span class="material-symbols-outlined" style="color: white;">shopping_cart</span>Login <a href="../index.php" class="btn btn-primary" style="float: right;">Voltar</a></h2>
				</div>
	<form action="leitura_de_dados.php" method="POST">
		<label for="">Nome: <input type="text" name="nome" required class="form-control" placeholder="Ex: João"> </label>
		<label for="">Senha: <input type="password" name="senha" required class="form-control" placeholder="Ex: po028"> </label>
		<label for=""><input type="submit" name="submit" required class="form-control btn btn-outline-success"></label>
	</form>

	<br>
	<a href="index.php" class="btn btn-success">Cadastro</a>
				</div>
	</div>
</body>
</html>