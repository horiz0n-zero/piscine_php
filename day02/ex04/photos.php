#!/usr/bin/php
<?php
	if ($argv[1]) {
		`curl $argv[1] -s -o tmp`;
		$tmp = @file_get_contents("tmp");
		if (count($tmp)) {
			preg_match_all('/<img.*?png/', $tmp, $matches);
			`mkdir $argv[1]`;
			foreach ($matches as $matchArray) {
				foreach ($matchArray as $match) {
					$index = 0;
					while ($match[$index] && $match[$index] != "=")
						$index++;
					if ($match[$index] == "=") {
						$index++;
						if ($match[$index] == "\"")
							$index++;
						echo substr($match, $index) . "\n";
						`curl -s $argv[1]/$match -o $argv[1]/$match`;
					}
				}
			}
		}
		`rm -rf tmp`;
	}
?>
