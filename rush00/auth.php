<?php

function auth($login, $passwd)
{
	if (file_exists("private/passwd"))
		$tab = unserialize(file_get_contents("private/passwd"));
	else
		return FALSE;
	if (!$tab)
		return FALSE;
	foreach ($tab as $key => $value) {
		if ($value['login'] === $login && $value['passwd'] === hash("whirlpool", $passwd))
				return [TRUE, $value['grade']];
	}
	return FALSE;
}

?>