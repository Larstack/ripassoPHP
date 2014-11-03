<?php
	session_start();
	if(isset($_SESSION["login"])&&$_SESSION["login"]=="auth"){
		if($_SERVER["PHP_SELF"]=="/ripassoPHP/index.php")
			header("location:./catalogo.php");
	}
	else if($_SERVER["PHP_SELF"]!="/ripassoPHP/index.php")
		header("location:./");