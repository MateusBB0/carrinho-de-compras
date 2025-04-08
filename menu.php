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
		<a href="index.php" class="navbar-brand"style="display: flex; align-items: center;">
			<span class="material-symbols-outlined" style="color: #188452 ;">shopping_cart</span>CartON</a>
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
    <?php if (isset($_SESSION['id_user'])): ?>
      
    
    <div class="dropdown">
  <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="a">
    <?php echo $_SESSION['nome']; ?>
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="user/leitura_de_dados.php?id_user=<?php echo $_SESSION['id']; error_reporting(0);
 ?>">Dados</a></li>
    <li><a class="dropdown-item" href="meucarrinho.php">Carrinho <span class="material-symbols-outlined">
    shopping_cart
    </span></a></li>
    <li>
      <a class="dropdown-item" href="user/sair.php">Sair <ion-icon name="close-circle" style='color: black !important;'></ion-icon>
  </a></li>
  </ul>
</div>
<?php endif ?>
</div>

</div>
     
	</nav>
</header>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>