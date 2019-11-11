<?php

session_start();

$id = array_search($_GET['id'], array_column($_SESSION['basket'], 'id'));

if ($_GET['remove'] == 'all')
	$_SESSION['basket'][$id]['quantity'] = 0;
else if ($_SESSION['basket'][$id]['quantity'] > 0)
	$_SESSION['basket'][$id]['quantity']--;

header('Location: basket.php');

?>