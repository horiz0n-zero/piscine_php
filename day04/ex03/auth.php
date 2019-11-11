<?php
	define("DIRECTORY", "../htdocs/private");
	define("FILE", DIRECTORY . "/passwd");
	
	function auth($login, $passwd) {
		if ($login && $passwd && $login != "" && $passwd != "") {
			$file_content = file_get_contents(FILE);
			$file_dictionary = unserialize($file_content);
			if ($file_dictionary[$login] && $file_dictionary[$login] == hash("sha512", $passwd))
				return true;
		}
		return false;
	}
?>
