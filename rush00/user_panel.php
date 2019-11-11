<?php

session_start();

if (!$_SESSION['loggued_on_user'])
{
	header('Location: login_auth.php&redirect=user_panel.php');
	exit("No user loggued on");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Panel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
</head>
<body>
	<?php
	include 'navbar.php';
	echo '<h1 style="width:100%;text-align:center;">Hello '.$_SESSION['loggued_on_user'].' !</h1>';
	echo '<h2 style="width:100%;text-align:center;">What do you want to do on your account ? </h2>';
	echo '<div id="body">
	<form action="modif_admin.php?login='.$_SESSION['loggued_on_user'].'" method="post">
	<input class="submit" type="submit" name="submit" value="delete"> 
	</form>
	<a href="modif_auth.php" id="modify"> Modify password. </a>
	</div>';
	?>
</body>
</html>
