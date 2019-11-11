<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Basket</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php
	include 'navbar.php';
	$file = file("stock.csv");
	foreach ($file as $key => $value) {
		$file[$key] = explode(';', $value);
	}
	$nb_article = 0;
	$total_price = 0;
	if (isset($_SESSION['basket']))
		foreach ($_SESSION['basket'] as $key => $tab) {
			if ($tab['quantity'])
			{
				echo '<div class="search_article">
					<img src="'.$file[$tab['id']][2].'" alt="image_article" class="article_img"> 
					<h2 class="titre_article">'.$file[$tab['id']][1].'</h2> <p class="prix">'.$file[$tab['id']][6].'$ </p>
					<h5 class="stock">'.$file[$tab['id']][5].' remaining</h5>
					<p class="description"> Description: '.$file[$tab['id']][3].'</p>
					<p class="cat"> Categories: '.$file[$tab['id']][4].'</p>
					</div>
					<div class="basket_management">
					<a class="remove_link" href="remove_basket.php?id='.$tab['id'].'&remove=all">Remove all</a><br/><p class="quantity"> quantity = '.$tab['quantity'].'</p>
					<a class="remove_link" href="remove_basket.php?id='.$tab['id'].'&remove=one">Remove one</a>
					</div>';
			}
			$nb_article += $tab['quantity'];
			$total_price += $file[$tab['id']][6] * $tab['quantity'];
		}
	echo '<div class="recap_basket">
		<ul class="recap">
			<li>Number of articles in basket : '.$nb_article.'</li>
			<li>Total price : '.$total_price.'</li>';
			if ($nb_article > 0)
				echo '<li><a href="basket_validate.php">Validate and pay your basket.</a>';
			else
				echo '<li>Validate and pay your bucket.';
			echo '</li>
		</ul>
	</div>';
	?>
</body>
</html>