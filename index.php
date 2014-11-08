<?php
	$titolo = "Login";
	require_once "./lib/session.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $titolo; ?></title>
		<link rel="shortcut icon" href="./img/logout2.png" />
		<link rel="stylesheet" type="text/css" href="./style/login.css" />
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
					<input type="submit" id="bottone" value="Submit"></input>
				</fieldset>
			</form>
		</div>
		<?php
			if(isset($_GET["error"])){
		?>
				<div class="error">
					<p>Dati inseriti non validi.</p>
				</div>
		<?php
			}
		?>
	</body>