<?php

	if (!file_exists("private")) {
		mkdir("private");
	}
	if (file_exists("private/passwd"))
		$tab = unserialize(file_get_contents("private/passwd"));
	else
		$tab = NULL;
	if ($tab)
	{
		foreach ($tab as $value) {
			if (($value['login'] == $_POST['login'] || $_POST['submit'] != 'OK') || !$_POST['passwd'])
			{
				header('Location: create_auth.php');
				exit("ERROR\n");
			}
		}
	}
	$index = count($tab);
	$tab[$index]['login'] = htmlspecialchars($_POST['login']);
	$tab[$index]['passwd'] = hash("whirlpool", $_POST['passwd']);
	$tab[$index]['grade'] = 'member';
	file_put_contents("private/passwd", serialize($tab));
	header('Location: login_auth.php');
	exit("OK\n");
?>
