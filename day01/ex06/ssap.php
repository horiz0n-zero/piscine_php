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
		sort($splits);
		return ($splits);
	}

	$i = 1;
	$count = count($argv);
	$elements = array();

	while ($i < $count) {
		$new_elements = ft_split($argv[$i++]);
		foreach ($new_elements as $element) {
			array_push($elements, $element);
		}
	}
	sort($elements);
	foreach ($elements as $element) {
		echo $element . "\n";
	}
?>
