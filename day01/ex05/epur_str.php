#!/usr/bin/php
<?php
	$str = $argv[1];
	$index = 0;
	if (is_string($str)) {
		while ($str[$index] && $str[$index] == " ")
			$index++;
		while ($str[$index]) {
			if ($str[$index] == " ")
			{
				while ($str[$index] && $str[$index] == " ")
					$index++;
				if ($str[$index])
					echo " ";
			}
			while ($str[$index] && $str[$index] != " ")
				echo $str[$index++];
		}
		echo "\n";
	}
?>
