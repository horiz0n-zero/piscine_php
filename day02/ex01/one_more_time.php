#!/usr/bin/php
<?php

	function wrongFormat() {
		echo "Wrong Format\n";
	}

	if ($argv[1]) {
		$str = $argv[1];
		$index = 0;
		while ($str[$index] && $str[$index] != " ")
			$index++;
		if (!$index)
			return wrongFormat();
		define("REG_DAYS", "([Ll][Uu][Nn][Dd][Ii]|[Mm][Aa][Rr][Dd][Ii]|[Mm][Ee][Rr][Cc][Rr][Ee][Dd][Ii]|[Jj][Ee][Uu][Dd][Ii]|[Vv][Ee][Nn][Dd][Rr][Ee][Dd][Ii]|[Ss][Aa][Mm][Ee][Dd][Ii]|[Dd][Ii][Mm][Aa][Nn][Cc][Hh][Ee])");
		define("REG_MONTHS", "([Jj][Aa][Nn][Vv][Ii][Ee][Rr]|[Ff][Ee][Vv][Rr][Ii][Ee][Rr]|[Mm][Aa][Rr][Ss]|[Aa][Vv][Rr][Ii][Ll]|[Mm][Aa][Ii]|[Jj][Uu][Ii][Nn]|[Jj][Uu][Ii][Ll][Ll][Ee][Tt]|[Aa][Oo][Uu][Tt]|[Ss][Ee][Pp][Tt][Ee][Mm][Bb][Rr][Ee]|[Oo][Cc][Tt][Oo][Bb][Rr][Ee]|[Nn][Oo][Vv][Ee][Mm][Bb][Rr][Ee]|[Dd][Ee][Cc][Ee][Mm][Bb][Rr][Ee])");
		if (!preg_match("/" . REG_DAYS . ' [0-9]{1,2} ' . REG_MONTHS . ' [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}/', $str))
			return wrongFormat();
		if (preg_match("/[Ll][Uu][Nn][Dd][Ii]/", $str))
			$day = "monday";
		else if (preg_match("/[Mm][Aa][Rr][Dd][Ii]/", $str))
			$day = "tuesday";
		else if (preg_match("/[Mm][Ee][Rr][Cc][Rr][Ee][Dd][Ii]/", $str))
			$day = "wednesday";
		else if (preg_match("/[Jj][Ee][Uu][Dd][Ii]/", $str))
			$day = "thursday";
		else if (preg_match("/[Vv][Ee][Nn][Dd][Rr][Ee][Dd][Ii]/", $str))
			$day = "friday";
		else if (preg_match("/[Ss][Aa][Mm][Ee][Dd][Ii]/", $str))
			$day = "saturday";
		else
			$day = "sunday";
		$index++; // space

		$day_number = intval(substr($str, $index));
		while (ctype_digit($str[$index]))
			$index++;
		$index++;

		if (preg_match("/[Jj][Aa][Nn][Vv][Ii][Ee][Rr]/", $str))
			$month = "january";
		else if (preg_match("/[Ff][Ee][Vv][Rr][Ii][Ee][Rr]/", $str))
			$month = "february";
		else if (preg_match("/[Mm][Aa][Rr][Ss]/", $str))
			$month = "march";
		else if (preg_match("/[Aa][Vv][Rr][Ii][Ll]/", $str))
			$month = "april";
		else if (preg_match("/[Mm][Aa][Ii]/", $str))
			$month = "may";
		else if (preg_match("/[Jj][Uu][Ii][Nn]/", $str))
			$month = "june";
		else if (preg_match("/[Jj][Uu][Ii][Ll][Ll][Ee][Tt]/", $str))
			$month = "july";
		else if (preg_match("/[Aa][Oo][Uu][Tt]/", $str))
			$month = "august";
		else if (preg_match("/[Ss][Ee][Pp][Tt][Ee][Mm][Bb][Rr][Ee]/", $str))
			$month = "september";
		else if (preg_match("/[Oo][Cc][Tt][Oo][Bb][Rr][Ee]/", $str))
			$month = "october";
		else if (preg_match("/[Nn][Oo][Vv][Ee][Mm][Bb][Rr][Ee]/", $str))
			$month = "november";
		else
			$month = "december";

		while ($str[$index] != " ")
			$index++;
		$index++;


		$year = intval(substr($str, $index));
		while (ctype_digit($str[$index]))
			$index++;
		$index++;
		
		$hours = intval(substr($str, $index));
		while (ctype_digit($str[$index]))
			$index++;
		$index++;

		$mins = intval(substr($str, $index));
		while (ctype_digit($str[$index]))
			$index++;
		$index++;

		$secs = intval(substr($str, $index));
		if ($day_number <= 0 || $day_number > 31 || $hours < 0 || $hours >= 24 || $mins < 0 || $mins >= 60 || $secs < 0 || $secs >= 60)
			return wrongFormat();
		if (($timestamp = strtotime("$day $day_number $month $year $hours:$mins:$secs")) !== false)
			echo strtotime("$day $day_number $month $year $hours:$mins:$secs") . "\n";
	}
?>
