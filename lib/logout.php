<?php
	session_start();
	if(isset($_SESSION["login"])&&$_SESSION["login"]=="auth"){
		echo "Bye!<br />Redirecting..";
		session_destroy();
		header("refresh:1;url=../");
		exit;
	}
	header("location:../");