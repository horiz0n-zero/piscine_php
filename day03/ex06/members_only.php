<?php
	$user = $_SERVER['PHP_AUTH_USER'];
	$passwd = $_SERVER['PHP_AUTH_PW'];
	if ($user && $passwd) {
		if ($user == "zaz" && $passwd == "jaimelespetitsponeys") {
			$data = file_get_contents("../img/42.png");
			$data = base64_encode($data);
			echo "<html><body>Bonjour Zaz<br /><img src='data:image/png;base64,$data'></body></html>";
		}
		else {
			echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
		}
	}
	else
		header("WWW-Authenticate: Basic realm='Espace membres'");
?>
