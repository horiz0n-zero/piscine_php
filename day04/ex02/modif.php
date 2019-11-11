<?php
	$login = $_POST['login'];
	$oldpw = $_POST['oldpw'];
	$newpw = $_POST['newpw'];
	$submit = $_POST['submit'];

	define("DIRECTORY", "../htdocs/private");
	define("FILE", DIRECTORY . "/passwd");
	if ($login && $oldpw && $newpw && $submit) {
		if ($login != "" && $oldpw != "" && $newpw != "" && $submit === "OK") {
			$file_content = file_get_contents(FILE);
			$file_dictionary = unserialize($file_content);
			if (!$file_dictionary[$login]) {
				echo "ERROR\n";
				return ;
			}
			else {
				if ($file_dictionary[$login] != hash("sha512", $oldpw)) {
					echo "ERROR\n";
					return ;
				}
				$file_dictionary[$login] = hash("sha512", $newpw);
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
