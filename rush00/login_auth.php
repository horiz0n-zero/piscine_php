<!DOCTYPE html>
<html>
<head>
	<title>Login minishop</title>
	<link rel="stylesheet" type="text/css" href="css/auth.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div id="body">
		<?php
		echo '<form action="login.php';
		if (isset($_GET['redirect']))
			echo '?redirect='.$_GET['redirect'];
		echo '" method="post" class="auth">';
		?>
			<div class="input"> Identifiant: <input type="text" name="login" class="login"></div>
			<br/>
			<div class="input"> Mot de passe: <input type="password" name="passwd" class="passwd"></div>
			<br/>
			<div class="input"> <input type="submit" name="submit" value="OK" class="submit"></div>
		</form>
		<br />
		<a href="create_auth.php" class="login_a">You don't have an account ? Register !!</a><br/>
		<br/>
		<a href="modif_auth.php" class="login_a">Modify you password.</a>
	</div>
</body>
</html>