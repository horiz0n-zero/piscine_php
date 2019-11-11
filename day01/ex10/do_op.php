#!/usr/bin/php
<?php
	if (count($argv) != 4) {
		echo "Incorrect Parameters\n";
		return ;
	}
	$l1 = intval($argv[1]);
	$l2 = intval($argv[3]);
	$index = 0;
	if (!is_int($l1) || !is_int($l2))
		return ;
	while ($argv[2][$index]) {
		if ($argv[2][$index] == "+" || $argv[2][$index] == "-" || $argv[2][$index] == "/" || $argv[2][$index] == "*" || $argv[2][$index] == "%") {
			if ($argv[2][$index] == "+")
				$value = $l1 + $l2;
			else if ($argv[2][$index] == "-")
				$value = $l1 - $l2;
			else if ($argv[2][$index] == "/")
				$value = $l1 / $l2;
			else if ($argv[2][$index] == "*")
				$value = $l1 * $l2;
			else if ($argv[2][$index] == "%")
				$value = $l1 % $l2;
			echo $value . "\n";
			return ;
		}
		$index++;
	}
?>
