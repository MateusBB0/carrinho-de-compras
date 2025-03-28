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
	
</head>
<body>
	
	<header>
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
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Roupas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Celulares</a>
        </li>
        <li class="nav-item"><a href="user/login.php" class="nav-link">Login</a></li>
    </ul>  
    <?php 
    		echo'
    		<!-- Example split danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger">Action</button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only"></span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#" style="background-color:black;">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>';

     ?>
    </div>

  


    <!-- <div id="meu_carrinho"> 
    	<a href="meucarrinho.php" style="text-decoration: none;" title="Meu carrinho">
    <span class="material-symbols-outlined">
		shopping_cart
		</span>
	</a>
		</div> -->
</div>
	</nav>
</header>
