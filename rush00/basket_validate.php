<?php

session_start();

if (!isset($_SESSION['basket']))
{
	header('Location: index.php');
	exit("No basket");
}

if (!$_SESSION['loggued_on_user'])
{
	header('Location: login_auth.php?redirect=basket_validate.php');
	exit("No user loggued");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Basket payment.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		include 'navbar.php';
		echo '<h1 style="text-align:center;font-size=1.3em;width=100%;">Your basket has been validate and paid, you will receive your articles within 2 weeks. Thank you !!</h1>';
		if (file_exists("private/logbook"))
			$tab = unserialize(file_get_contents('private/logbook'));
		else
			$tab = NULL;
		if ($tab)
			$index = count($tab);
		$file = file("stock.csv");
		foreach ($file as $key => $value) {
			$file[$key] = explode(';', $value);
		}
		date_default_timezone_set('Europe/Paris');
		foreach ($_SESSION['basket'] as $key => $value) {
			if ($value['quantity'])
			{
				$tab[$index] = $file[$value['id']];
				$tab[$index]['quantity'] = $value['quantity'];
				$tab[$index]['user'] = $_SESSION['loggued_on_user'];
				$tab[$index]['date'] = date('d/m/Y H:i:s');
				$index++;
			}
		}
		file_put_contents("private/logbook", serialize($tab));
		foreach ($_SESSION['basket'] as $key => $value) {
			//gestion des stocks
		}
		$_SESSION['basket'] = NULL;
	?>
</body>
</html>