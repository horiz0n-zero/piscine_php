<!DOCTYPE html>
<html>
<head>
	<title>Index_modify</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
</head>
<body>
	<?php include 'navbar.php' ?>
	<div id="body">
		<form action="modif.php" method="post" class="auth">
			<div class="input">Identifiant: <input type="text" name="login" class="login" /></div>
			<br/>
			<div class="input">Ancien mot de passe: <input type="password" name="oldpw"/></div>
			<br/>
			<div class="input">Nouveau mot de passe: <input type="password" name="newpw"/></div>
			<br/>
			<div class="input"><input type="submit" name="submit" value="OK" class="submit" /></div>
		</form>
	</div>
</body>
</html>