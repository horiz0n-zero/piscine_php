<?php

extract($_POST);

$file = file('stock.csv');
$i = 0;
$tab = array();
$a = 0;
while (isset($file[$i])) {
	$cats = explode(";", $file[$i]);
	$cat = explode(',', $cats[4]);
	if (preg_match("#".$txt."#", trim($cat[0]))) {
		if (!in_array($cat[0], $tab)) {
			$tab[$a] = $cat[0];
			$a++;
		}
	}
	if (preg_match("#".$txt."#", trim($cat[1]))) {
		if (!in_array($cat[1], $tab)) {
			$tab[$a] = $cat[1];
			$a++;
		}
	}
	$i++;
}
foreach ($tab as $key => $value) {
	echo $value."<br>";
}

?>