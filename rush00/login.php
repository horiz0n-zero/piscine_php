<?php

include("auth.php");
session_start();
$tab = auth($_POST['login'], $_POST['passwd']);
if ($tab[0])
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	$_SESSION['grade'] = $tab[1];
	if (isset($_GET['redirect']))
		header('Location: '.$_GET['redirect']);
	else
		header('Location: index.php');
		
	exit("OK\n");
}
else
{
	$_SESSION['loggued_on_user'] = "";
	if (isset($_GET['redirect']))
		header('Location: login_auth.php?redirect='.$_GET['redirect']);
	else
		header('Location: login_auth.php');
	exit("ERROR\n");
}
?>