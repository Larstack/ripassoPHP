<?php
	session_start();
	if(isset($_SESSION["login"])){
		if($_SESSION["login"]!="auth"){
			header("location:./index.php");
		}
		else if($_SERVER["PHP_SELF"]=="/carrito/index.php"){
			header("location:./catalogo.php");
		}
	}