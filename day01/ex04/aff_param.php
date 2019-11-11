#!/usr/bin/php
<?php
	$count = count($argv);
	for ($index = 1; $index < $count; $index++) {
		echo $argv[$index] . "\n";
	}
?>
