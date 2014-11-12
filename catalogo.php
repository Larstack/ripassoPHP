<?php
	function __autoload($classe){
		require_once "./lib/$classe.php";
	}
	require_once "./lib/session.php";
	$titolo = "Catalogo";
	$catalogo = new Catalogo();
	$categorias = $catalogo->getCategorias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="iso-8859-1">
	<title><?php echo $titolo; ?></title>
	<link rel="shortcut icon" href="./img/logout2.png" />
	<link rel="stylesheet" type="text/css" href="./style/catalogo.css" />
</head>
<body>
	<header>
		<h1><?php echo $titolo; ?></h1>
			<div class="menu">
				<ul>
					<li><a href="catalogo.php">Categorias</a></li>
					<li><a href="productos.php">Productos</a></li>
				</ul>
			</div>
		<div class="logout">
			<a href="./lib/logout.php"><img title="Logout" alt="logout" src="./img/logout.gif" width="20px" height="20px" /></a>
		</div>
	</header>
<?php
	if(isset($_SESSION["carrito"])){
?>
		<div class="carrito">
			<h3>Nel carrello:</h3>
			<ul>
<?php
		foreach($_SESSION["carrito"] as $key=>$value){
?>
			<li>
				<a id="rm" href="
				<?php 
					if(isset($_GET['cat_id'])){
						echo './lib/rm_car.php?prd_id='.$key.'&cat_id='.$_GET['cat_id'];
					}else{
						echo './lib/rm_car.php?prd_id='.$key;
					}
				?>">
					<img title="Logout" alt="Logout" src="./img/borrar2.png" width="10px" height="10px" />
				</a>
				<p class="prd"><?php echo $catalogo->getProductoById($key)[0]["prd_nombre"]; ?></p>
				<p class="qta"><?php echo $value; ?></p>
			</li>
<?php
		}
?>
			</ul>			
		</div>
<?php
	}
?>
	<div class="categorias">
		<h2>Categorias</h2>
		<div class="lista">
		<ul>
<?php
	foreach($categorias as $row){
?>
		<li>
			<a href="productos.php?cat_id=<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_nombre"]; ?></a>
		</li>
<?php
	}
?>
			<li id="allPrd">
				<a id="allPrd" href="productos.php">Todos los productos</a>
			</li>
		</ul>
		</div>
	</div>
</body>
</html>