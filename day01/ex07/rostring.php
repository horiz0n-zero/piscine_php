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

	if ($argv[1]) {
		$elements = ft_split($argv[1]);
		$count = count($elements);
		if ($count > 1) {
			$element = array_shift($elements);
			array_push($elements, $element);
		}
		for ($i = 0; $i < $count; $i++) {
			echo $elements[$i] . "\n";
		}
	}
?>
