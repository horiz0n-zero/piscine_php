<?php

	require_once 'Game.class.php';
	require_once 'Destiny.class.php';
	require_once 'Nakai.class.php';

	$documentsHTML = "";

	$documentsHTML .= '<style> '; $documentsHTML .= file_get_contents('css/style.css'); $documentsHTML .= '</style>';
	$documentsHTML .= '<script type="text/javascript">'; $documentsHTML .= 'js/javascript.js' ; $documentsHTML .= '</script>';

	define(XELEMENTS, 150);
	define(YELEMENTS, 100);

	$game = new Game();
	$game->newPartie();

	# head
	$documentsHTML .= '<div class=head><h1>';
	$documentsHTML .= "jouer une partie";
	$documentsHTML .= '</h1></div><br>';

	$documentsHTML .= '<div class=map>';
	for ($y = 0; $y < YELEMENTS; $y++) {
		for ($x = 0; $x < XELEMENTS; $x++) {
			if (($x + $y) % 2)
				$documentsHTML .= "<div class=row id=\"$x-$y\"></div>";
			else
				$documentsHTML .= "<div class=row id=\"$x-$y\" style=\"opacity: 0.2;\"></div>";
		}
		$documentsHTML .= '<br>';
	}
	$documentsHTML .= '</div>';
	# # # start logic

	function toto() {
		echo '<h1>lol</h1>';
	}

	# # # end logic
	# controls
	function createControl(&$documentsHTML, $ship, $id) {
		$divid = $ship->side . $id;
		if ($ship->side == "l")
			$documentsHTML .= "<div class=\"control left\" id=$divid>";
		else
			$documentsHTML .= "<div class=\"control right\" id=$divid>";
		$title = get_class($ship) . " $ship->pp PP [ $ship->pv PV [ $ship->shield SHIELD ] ] [ $ship->atk ATK ]";
		$documentsHTML .= "<h2 style=\"margin-left: 1vw;\">$title</h2>";
		$documentsHTML .= '<img src="/img/left.png" style="bottom: 10px; left: 60px; margin-left: 0.6vw;">';
		$documentsHTML .= '<img src="/img/right.png" style="">';
		$documentsHTML .= '<img src="/img/top.png" style="">';
		$documentsHTML .= '<img src="/img/bottom.png" style="">';
		$documentsHTML .= '<br>';
		$documentsHTML .= '<div class=action>ATK</div><div class=action>SPE</div>';
		$documentsHTML .= "</div>";
	}
	$documentsHTML .= "<br>";
	createControl($documentsHTML, $game->rships[0], 2);
	createControl($documentsHTML, $game->rships[2], 3);
	createControl($documentsHTML, $game->lships[0], 1);
	$documentsHTML .= "<br>";
	createControl($documentsHTML, $game->rships[1], 1);
	createControl($documentsHTML, $game->lships[2], 3);
	createControl($documentsHTML, $game->lships[1], 2);

	# get dom
	$document = new DOMDocument();
	$document->loadHTML($documentsHTML);

	# place ships
	function popShips($document, $ship) {
		$div = $document->getElementById($ship->coordID());
		$div->setAttribute("style", "background-color: blue; opacity: 1.0;");
	}
	foreach ($game->rships as $ship) {
		popShips($document, $ship);
	}
	foreach ($game->lships as $ship) {
		popShips($document, $ship);
	}


	echo $document->saveHTML();
?>













