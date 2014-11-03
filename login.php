<?php
	function __autoload($classe){
		require_once "./lib/$classe.php";
	}
	if(!empty($_POST)){
		$login = new Login($_POST["username"],$_POST["clave"]);
		$res = $login->verificaAuth();
		if($res){
			echo "Welcome ".$_POST["username"]."!<br />Redirecting..";
			session_start();
			$_SESSION["login"] = "auth";
			header("refresh:1;url=catalogo.php");
			exit;
		}
	}
	header("location:./?error=1");