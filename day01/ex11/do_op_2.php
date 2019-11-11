#!/usr/bin/php
<?php

	if ($argv[1]) {
		$index = 0;
		while (ctype_space($argv[1][$index]))
			$index++;

		if (!ctype_digit($argv[1][$index])) {
			echo "Syntax Error\n";
			return ;
		}
		$value1 = intval(substr($argv[1], $index, strlen($argv[1]) - $index));
		while ($argv[1][$index] && ctype_digit($argv[1][$index]))
			$index++;

		while (ctype_space($argv[1][$index]))
			$index++;

		if ($argv[1][$index] == "+" || $argv[1][$index] == "-" || $argv[1][$index] == "/" || $argv[1][$index] == "*" || $argv[1][$index] == "%")
			$operator = $argv[1][$index++];
		else {
			echo "Syntax Error\n";
			return ;
		}

		while (ctype_space($argv[1][$index]))
			$index++;

		if (!ctype_digit($argv[1][$index])) {
			echo "Syntax Error\n";
			return ;
		}
		$value2 = intval(substr($argv[1], $index, strlen($argv[1]) - $index));
		while ($argv[1][$index] && ctype_digit($argv[1][$index]))
			$index++;

		while (ctype_space($argv[1][$index]))
			$index++;

		if ($argv[1][$index]) {
			echo "Syntax Error\n";
			return ;
		}
		if ($operator == "+")
			$value = $value1 + $value2;
		else if ($operator == "-")
			$value = $value1 - $value2;
		else if ($operator == "/")
			$value = $value1 / $value2;
		else if ($operator == "*")
			$value = $value1 * $value2;
		else if ($operator == "%")
			$value = $value1 % $value2;
		echo $value . "\n";
	}
	else
		echo "Incorrect Parameters\n";
?>
