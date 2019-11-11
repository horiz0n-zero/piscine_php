<?php

session_start();

if ($_SESSION['grade'] != 'admin')
{
	header('Location: index.php');
	exit ("Unauthorized access\n");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin space</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<?php include 'admin_bar.php'; ?>
</body>
</html>