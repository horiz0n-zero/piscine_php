<?php

session_start();

include "auth.php";

if ($_SESSION['grade'] != 'admin')
{
	header('Location: index.php');
	exit ("Unauthorized access\n");
}

if ($_POST['submit'] == "OK")
{
	$tab = unserialize(file_get_contents("private/passwd"));
	if (!auth($_SESSION['loggued_on_user'], $_POST['passwd']))
	{
		header('Location: index.php');
		exit("Authentification error\n");
	}
	foreach ($tab as $key => $value) {
		if ($value['login'] == $_POST['login'])
		{
			$user = $value;
			$index = $key;
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin User</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<?php include 'admin_bar.php'; ?>
	<div id="body">
		<form action="admin_user.php" method="post" class="auth">
			<div class="input">Identifiant de l'user: <input type="text" name="login" class="login"/></div>
			<br/>
			<div class="input">Mot de passe admin: <input type="password" name="passwd" class="passwd"/></div>
			<br/>
			<div class="input"><input type="submit" name="submit" value="OK" class="submit"></div>
		</form>
	</div>
	<?php
	if (isset($user) && isset($index))
	{
		echo '<div id="user_control">
		<ul id="user_data">
		<li>Login : '.$user['login'].'</li>
		<li>Password (hashed) : '.$user['passwd'].'</li>
		<li>Grade: '.$user['grade'].'</li>
	</ul>
	<form action="modif_admin.php?login=';
	echo $user['login'];
	echo '" method="post" id="grade_modif">
		<input type="submit" name="submit" value="';
		if ($user['grade'] == 'member')
			echo "upgrade to admin";
		else
			echo "downgrade to member";
		echo '"><input type="submit" name="submit" value="delete"></form>';
	}
	else if ($_POST['submit'] == 'OK')
		echo '<h3 id="exists">This user doesn\'t exists</h3>';
	echo '</div>';
	?>
</body>
</html>
