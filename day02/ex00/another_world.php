#!/usr/bin/php
<?php
	if ($argv[1]) {
		$argv[1] = preg_replace("/[ \t]* /", ' ', $argv[1]);
		$argv[1] = preg_replace("/^ /", "", $argv[1]);
		$argv[1] = preg_replace("/ $/", "", $argv[1]);
		echo $argv[1] . "\n";
	}
?>
