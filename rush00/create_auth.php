<!DOCTYPE html>
<html>
<head>
	<title>Create_minishop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div id="body">
		<form action="create.php" method="post" class="auth">
			<div class="input">Identifiant: <input type="text" name="login" class="login"/></div>
			<br/>
			<div class="input">Mot de passe: <input type="password" name="passwd" class="passwd"/></div>
			<br/>
			<div class="input"><input type="submit" name="submit" value="OK" class="submit"></div>
		</form>
	</div>
</body>
</html>