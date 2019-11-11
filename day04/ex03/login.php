<?php
	define("DIRECTORY", "../htdocs/private");
	define("FILE", DIRECTORY . "/passwd");
	include("auth.php");

	$login = $_GET['login'];
	$passwd = $_GET['passwd'];
	session_start();
	if (auth($login, $passwd)) {
		$_SESSION['loggued_on_user'] = $login;
		echo "OK\n";
	}
	else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>
