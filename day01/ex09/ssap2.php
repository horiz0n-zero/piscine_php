#!/usr/bin/php
<?php
	function ft_split($str) {
		$splits = array();
		$index = 0;

		while ($str[$index]) {
			while (ctype_space($str[$index])) {
				$index++;
			}
			if ($str[$index]) {
				$start = $index;
				while ($str[$index] && !ctype_space($str[$index])) {
					$index++;
				}
				$splits[] = substr($str, $start, $index - $start);
			}
			else
				$index++;
		}
		return ($splits);
	}


	$elements = array();
	$index = 1;
	while ($index < count($argv)) {
		$new_elements = ft_split($argv[$index++]);
		foreach ($new_elements as $element) {
			array_push($elements, $element);
		}
	}
	sort($elements);
	$alphas = array();
	$numbers = array();
	$others = array();
	for ($i = 0; $i < count($elements); $i++) {
		$c = $elements[$i][0];

		if (ctype_alpha($c))
			array_push($alphas, $elements[$i]);
		else if (ctype_digit($c))
			array_push($numbers, $elements[$i]);
		else
			array_push($others, $elements[$i]);
	}
	natcasesort($alphas);
	natcasesort($numbers);
	natcasesort($others);
	foreach ($alphas as $a)
		echo $a . "\n";
	foreach ($numbers as $n)
		echo $n . "\n";
	foreach ($others as $o)
		echo $o . "\n";
?>
