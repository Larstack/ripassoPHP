<?php
	session_start();
	if(isset($_SESSION["login"])&&$_SESSION["login"]=="auth"){
		if(isset($_GET["prd_id"]))
			$_SESSION["carrito"][$_GET["prd_id"]] = 1;
		if(isset($_GET["cat_id"])){
			header("location:../productos.php?cat_id=".$_GET["cat_id"]);
			exit;
		}
		header("location:../productos.php");
		exit;
	}
	header("location:../");