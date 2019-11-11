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
?>
