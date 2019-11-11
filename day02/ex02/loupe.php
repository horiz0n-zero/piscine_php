#!/usr/bin/php
<?php

	function upper_title(& $str, $index) {
		$index++;
		if ($str[$index] == "i") {
			$index++;
			if ($str[$index] == "t") {
				$index++;
				if ($str[$index] == "l") {
					$index++;
					if ($str[$index] == "e") {
						$index++;
						if ($str[$index] == "=") {
							$index++;
							while ($str[$index] && $str[$index] != ">" && $str[$index] != "<") {
								$str[$index] = strtoupper($str[$index]);
								$index++;
							}
						}
					}
				}
			}
		}
		return $index;
	}

	if (($str = $argv[1])) {
		$index = 0;
		$str = file_get_contents($str);
		if (is_bool($str))
			return ;

		while ($str[$index]) {
			if ($str[$index] == "<") {
				$index++;
				if ($str[$index] == "a") {
					$index++;
					if ($str[$index] == " ") {
						while ($str[$index] && $str[$index] != ">") {
							if ($str[$index] == "t")
								$index = upper_title($str, $index);
							$index++;
						}
						if ($str[$index] == ">") {
							$index++;
							while ($str[$index] && $str[$index] != "<") {
								$str[$index] = strtoupper($str[$index]);
								$index++;
							}
							if ($str[$index] == "<")
								$index++;
						}
					}
				}
			}
			else if ($str[$index] == "t") {
				$index = upper_title($str, $index);
			}
			else
				$index++;
		}
		echo $str;
	}
?>
