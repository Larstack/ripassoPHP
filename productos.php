<?php
	function __autoload($classe){
		require_once "./lib/$classe.php";
	}
	require_once "./lib/session.php";
	$titolo = "Productos";
	$catalogo = new Catalogo();
	$productos = isset($_GET["cat_id"]) ? $catalogo->getProductos($_GET["cat_id"]) : $catalogo->getProductos();
?>
<!DOCTYPE html>
<html lang="es_ES">
	<head>
		<meta charset="iso-8859-1">
		<title><?php echo $titolo; ?></title>
		<link rel="stylesheet" text="text/css" href="./style/productos.css" />
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
				<p><?php print_r($catalogo->getProductoById($key)[0]["prd_nombre"]); ?></p>
			</li>
<?php
		}
?>
			</ul>			
		</div>
<?php
	}
?>
		<div class="productos">
			<ul>
<?php
	foreach($productos as $producto){
?>
		<li>
			<a id="prd<?php echo $producto["prd_id"]; ?>" href="javascript:getDescr(<?php echo $producto["prd_id"]; ?>);" data-ctrl="close"><?php echo $producto["prd_nombre"]; ?></a>
			<div class="add">
				<a href="
				<?php 
					if(isset($_GET['cat_id'])){
						echo './lib/add_car.php?prd_id='.$producto['prd_id'].'&cat_id='.$_GET['cat_id'];
					}else{
						echo './lib/add_car.php?prd_id='.$producto['prd_id'];
					}
				?>">
					<img title="Add" alt="Add" src="./img/add.png" width="20px" height="20px" />Add
				</a>
			</div>
			<p><?php echo $producto["prd_precio"]."$"; ?></p>
			<div class="descr" id="descr<?php echo $producto["prd_id"]; ?>">
				<p><?php echo $producto["prd_descripcion"]; ?></p>
			</div>
		</li>
<?php
	}
?>
				</ul>
			</div>
		<script type="text/javascript" src="./js/productos.js"></script>
	</body>
</html>