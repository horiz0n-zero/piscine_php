<?php
	$action = $_GET['action'];
	$name = $_GET['name'];
	$value = $_GET['value'];

	if ($action) {
		if ($action == "get") {
			echo $_COOKIE[$name] . "\n";
		}
		else if ($action == "set") {
			setcookie($name, $value, time() + 60* 60 * 24 * 30);
		}
		else if ($action == "del") {
			setcookie($name, $value, 0);
		}
	}
?>
