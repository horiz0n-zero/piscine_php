<?php
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$submit = $_POST['submit'];

	define("DIRECTORY", "../htdocs/private");
	define("FILE", DIRECTORY . "/passwd");
	if ($login && $passwd && $submit) {
		if ($login != "" && $passwd != "" && $submit === "OK") {
			if (!file_exists(DIRECTORY)) {
				if (!mkdir(DIRECTORY, 0777, true)) {
					echo "ERROR\n";
					return ;
				}
			}
			if (!file_exists(FILE)) {
				file_put_contents(FILE, serialize(array()));
			}
			$file_content = file_get_contents(FILE);
			$file_dictionary = unserialize($file_content);
			if ($file_dictionary[$login]) {
				echo "ERROR\n";
			}
			else {
				$file_dictionary[$login] = hash("sha512", $passwd);
				echo "OK\n";
			}
			file_put_contents(FILE, serialize($file_dictionary));
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
