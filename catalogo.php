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
<html lang="es_ES">
<head>
	<meta charset="iso-8859-1">
	<title><?php echo $titolo; ?></title>
</head>
<body>
	<header>
		<h1><?php echo $titolo; ?></h1>
	</header>
	<div class="categorias">
		<h2>Categorias</h2>
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
			<li>
				<a href="productos.php">Todos los productos</a>
			</li>
		</ul>
	</div>
</body>
</html>