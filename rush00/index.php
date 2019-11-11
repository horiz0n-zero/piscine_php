<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>index.php</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<br>
<h1 style="display: inline;">Bienvenue à toutes et à tous ! </h1> <h2 style="display: inline">Ici, pas de jugements, on vend de tout à tout le monde</h2>
<p>On se connait? Non?.. mais on peut se tutoyer :-)<br>
Dans un premier temps, tu peux faire ta selection avant de te log ou de t'inscrire.<br>
Ou si tu veux, inscris toi directement et vois ce qui se passe!!
<br>Ou tu peux aussi te balader à ta guise...</p>


<?php
	$fd = fopen("stock.csv", "r");

	if (!$fd)
		exit("Imposible d'acceder au stock");
	while ($tab = fgetcsv($fd, 0, ';') )
	{
		if (!empty($tab[1])){
				echo '<div class="search_article">
				<img src="'.$tab[2].'" alt="image_article" class="article_img"> 
				<h2 class="titre_article">'.$tab[1].'</h2> <p class="prix">'.$tab[6].'$ </p>
				<p class="description"> Description: '.$tab[3].'</p>
				<p class="cat"> Categories: '.$tab[4].'</p>
				<a href="add_basket.php?id='.$tab[0].'&redirect=index.php" class="addto"> Add to basket ('.$tab[5].')</a>
				</div>';
				echo "<br>";
			}
		}
	?>

</html>
