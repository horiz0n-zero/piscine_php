<?php

session_start();

if ($_SESSION['grade'] != 'admin')
{
	header('Location: index.php');
	exit ("Unauthorized access\n");
}

if (file_exists('private/logbook'))
	$tab = unserialize(file_get_contents('private/logbook'));
else
	$tab = NULL;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logbook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<?php
		include 'navbar.php';
		include 'admin_bar.php';
		if (!$tab)
		{
			echo '<h1 style="width:100%;text-align:center;">You never sell something. Try harder !!</h1>';
			exit ;
		}
		echo '<table>
			<thead>
				<tr>
					<th>User</th>
					<th>Article</th>
					<th>Date</th>
					<th>Number</th>
					<th>Total Price</th>
				</tr>
			</thead>
			<tbody>
				';
		foreach ($tab as $key => $value) {
			echo '<tr>
				<td>'.$value['user'].'</td>
				<td>'.$value[1].'</td>
				<td>'.$value['date'].'</td>
				<td>'.$value['quantity'].'</td>
				<td>'.$value['quantity'] * $value[6].'</td>
				</tr>';
		}
		echo '</tbody>
		</table>';
	?>
</body>
</html>