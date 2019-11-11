#!/usr/bin/php
<?php
	$count = count($argv);
	if ($count > 2) {
		$index = 2;
		$key = $argv[1] . ":";
		$key_lenght = strlen($key);
		while ($index < $count) {
			$str = strstr($argv[$index], $key);
			if ($str && !strncmp($key, $argv[$index], $key_lenght)) {
				$result = substr($argv[$index], $key_lenght, strlen($argv[$index]) - $key_lenght);
			}
			$index++;
		}
		if ($result)
			echo $result . "\n";
	}
?>
