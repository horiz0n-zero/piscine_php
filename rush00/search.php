<?php
session_start();
?>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php
	include 'navbar.php';
	$fd = fopen("stock.csv", "r");
	$nb_elem = 0;
	if (!$fd)
		exit("Imposiible d'acceder au stock");
	while ($tab = fgetcsv($fd, 0, ';'))
	{
		if (isset($_GET['search']) AND !empty($_GET['search'])){
			if (strstr($tab[1], $_GET['search']))
			{
				echo '<div class="search_article">
				<img src="'.$tab[2].'" alt="image_article" class="article_img"> 
				<h2 class="titre_article">'.$tab[1].'</h2> <p class="prix">'.$tab[6].'$ </p>
				<p class="description"> Description: '.$tab[3].'</p>
				<p class="cat"> Categories: '.$tab[4].'</p>
				<a href="add_basket.php?id='.$tab[0].'&redirect=index.php" class="addto"> Add to basket ('.$tab[5].')</a>
				</div>';
				echo "<br>";

				echo '<div>';
				echo '<form action="" method="post">
				Quantity : <input type="number" name="quantity">
				</form>
				<a href="add_basket.php?';
				if (isset($_POST['quantity']))
					echo 'quantity='.$_POST['quantity'].'&';
				echo 'id='.$tab[0].'&redirect=search.php?search='.$_GET['search'].'" class="addItems"> Add to basket </a>
				</div>';
				$nb_elem++;
			}
		}
	}
	if (!$nb_elem)
		echo "<h2>Sorry, we couldn't find this article in our stock ! :( </h2>";

	?>
</body>
</html>
