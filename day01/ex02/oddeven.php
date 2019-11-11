#!/usr/bin/php
<?php

	function getNumber() {
		$in = fopen('php://stdin', 'r');
		echo 'Entrez un nombre: ';
		$line = fgets($in);
		fclose($in);
		if (is_bool($line)) {
			return ;
		}
		if (!strlen($line) || !is_numeric($line[0])) {
			$line = str_replace("\n", "", $line);
			echo "'" . $line . "'" . " n'est pas un chiffre\n";
		}
		else {
			$integer = intval($line);
			if ($integer % 2) {
				echo 'Le chiffre ' . $integer . " est Impair\n";
			}
			else {
				echo 'Le chiffre ' . $integer . " est Pair\n";
			}
		}
		getNumber();
	}

	getNumber();
?>
