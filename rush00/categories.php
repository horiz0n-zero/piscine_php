<?php
session_start();
?>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php
	include 'navbar.php';
	$fd = fopen("stock.csv", "r");
	$nb_elem = 0;
	if (!$fd)
		exit("Imposible d'acceder au stock");
	while ($tab = fgetcsv($fd, 0, ';'))
	{
		if (isset($_GET['cat']) AND !empty($_GET['cat'])){
			if (strstr($tab[4], $_GET['cat']))
			{
				echo '<div class="search_article">
				<img src="'.$tab[2].'" alt="image_article" class="article_img"> 
				<h2 class="titre_article">'.$tab[1].'</h2> <p class="prix">'.$tab[6].'$ </p>
				<h5 class="stock">'.$tab[5].' remaining</h5>
				<p class="description"> Description: '.$tab[3].'</p>
				<p class="cat"> Categories: '.$tab[4].'</p>';
				echo '<form action="" method="post">
				Quantity : <input type="number" name="quantity">
				</form> 
				<a href="add_basket.php?';
				if (isset($_POST['quantity']))
					echo 'quantity='.$_POST['quantity'].'&';
				echo 'id='.$tab[0].'&redirect=categories.php?cat='.$_GET['cat'].'" class="addto"> Add to basket </a>
				</div>';
				$nb_elem++;
			}
		}
	}
	if (!$nb_elem)
		echo "<h2>Sorry, we couldn't find this categorie ! :( </h2>";
	?>
</body>
</html>