<?php

$tab = unserialize(file_get_contents("private/passwd"));

foreach ($tab as $key => $value) {
	if ($value['login'] == $_POST['login'] && $value['passwd'] == hash("whirlpool", $_POST['oldpw'])
		&& $_POST['submit'] == "OK" && $_POST['newpw'])
	{
		$tab[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
		file_put_contents("private/passwd", serialize($tab));
		header('Location: index.php');
		exit("OK\n");
	}
}
header('Location: modif_auth.php');
exit("ERROR\n")
?>