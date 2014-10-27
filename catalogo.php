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
		<table>
			<tr>
				<td>Categorias</td>
			</tr>
<?php
	foreach($categorias as $row){
?>
		<tr>
			<td><a href="productos.php?cat_id=<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_nombre"]; ?></a></td>
		</tr>

<?php
	}
?>
		</table>
	</div>
</body>
</html>