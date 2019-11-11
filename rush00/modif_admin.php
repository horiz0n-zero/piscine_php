<?php

session_start();

if ($_SESSION['grade'] != 'admin')
	if($_SESSION['loggued_on_user'] != $_GET['login'] || $_POST['submit'] != 'delete')
	{
		header('Location: index.php');
		exit ("Unauthorized access\n");
	}
if ($_POST['submit'] == "downgrade to member")
{
	$tab = unserialize(file_get_contents("private/passwd"));
	foreach ($tab as $key => $value) {
		if ($value['login'] == $_GET['login'])
		{
			$tab[$key]['grade'] = 'member';
			break ;
		}
	}
}
else if ($_POST['submit'] == "upgrade to admin")
{
	$tab = unserialize(file_get_contents("private/passwd"));
	foreach ($tab as $key => $value) {
		if ($value['login'] == $_GET['login'])
		{
			$tab[$key]['grade'] = 'admin';
			break ;
		}
	}
}
else if ($_POST['submit'] == 'delete' && $_GET['login'] != 'admin')
{
	$tab = unserialize(file_get_contents("private/passwd"));
	foreach ($tab as $key => $value) {
		if ($value['login'] == $_GET['login'])
		{
			$tab[$key] = NULL;
			$tab = array_values($tab);
			if ($_SESSION['loggued_on_user'] == $_GET['login'])
				header('Location: logout.php');
			break ;
		}
	}
}
file_put_contents("private/passwd", serialize($tab));
header('Location: admin.php');

?>