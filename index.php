<?php
	$titolo = "Catalogo";
	require_once "./lib/session.php"
?>
<!DOCTYPE html>
<html lang="es_ES">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $titolo; ?></title>
		<link rel="shortcut icon" href="https://static.mejorando.la/landing//static/images/favicon.ico" />
	</head>
	<body>
		<header>
			<h1><?php echo $titolo; ?></h1>
		</header>
		<div class="login">
			<form id="login" method="post" action="login.php">
				<fieldset>
					<label for="username">Username</label>
					<input id="username" name="username" type="text" autofocus="autofocus"></input>
					<label for="clave">Password</label>
					<input id="clave" name="clave" type="password"></input>
				</fieldset>
				<fieldset>
					<input type="submit"></input>
				</fieldset>
			</form>
		</div>
		<?php
			if(isset($_GET["error"])){
		?>
				<div class="error" style="background-color: red;">
					<p>Usuario e/o clave incorrectas</p>
				</div>
		<?php
			}
		?>
	</body>