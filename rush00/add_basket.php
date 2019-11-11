<?php

session_start();

if (isset($_SESSION['basket']))
	$id = array_search($_GET['id'], array_column($_SESSION['basket'], 'id'));
else
	$id = FALSE;

if ($id === FALSE)
{
	$id = count($_SESSION['basket']);
	$_SESSION['basket'][$id]['id'] = $_GET['id'];
	if (isset($_GET['quantity']))
		$_SESSION['basket'][$id]['quantity'] += $_GET['quantity'];
	else
		$_SESSION['basket'][$id]['quantity'] = 1;
}
else
{
	if (isset($_GET['quantity']))
		$_SESSION['basket'][$id]['quantity'] += $_GET['quantity'];
	else
		$_SESSION['basket'][$id]['quantity'] = 1;
}

header('Location: '.$_GET['redirect']);

?>
