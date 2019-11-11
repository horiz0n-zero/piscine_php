<?php
session_start();

if ($_SESSION['grade'] != 'admin')
{
	header('Location: index.php');
	exit ("Unauthorized access\n");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>crea elem</title>
</head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
<body>
	<?php include 'navbar.php'; 
	include 'admin_bar.php' ?>
	<br><br>
<div class="crea">
<h3>Ajouter un produit</h3>
	<br>
<form action="" method="post">
	nom : <input type="text" name="name">
	<br>
	url_img : <input type="text" name="img">
	<br>
	description : <input type="text" name="desc">
	<br>
	categorie : <input type="text" name="cat">
	<br>
	2e categorie(option) : <input type="text" name="cat1">
	<br>
	stock : <input type="number" name="stock">
	<br>
	prix : <input type="number" name="prix">
	<br>
	<input type="submit" name="submit" value="OK">
</form>
</div>
<?php

function articles() {
    $file = file('stock.csv');
	$i = count($file);
	echo($i + 1)." produits en vente"; 
    return ($i);
}
if (isset($_POST['submit'])) 
{
    if (isset($_POST['name']) AND !empty($_POST['name']) AND isset($_POST['img']) AND !empty($_POST['img']) AND isset($_POST['desc']) AND !empty($_POST['desc']) AND isset($_POST['cat']) AND !empty($_POST['cat']) AND isset($_POST['stock']) AND !empty($_POST['stock']) AND isset($_POST['prix']) AND !empty($_POST['prix']))
    	{
        	$name = htmlspecialchars($_POST['name']);
        	$img = htmlspecialchars($_POST['img']);
        	$desc = htmlspecialchars($_POST['desc']);
        	$cat = htmlspecialchars($_POST['cat']);
        	$stock = htmlspecialchars($_POST['stock']);
        	$prix = htmlspecialchars($_POST['prix']);
        	$id = articles();
        	if (($_POST['cat1']) AND !empty($_POST['cat1'])){
				$cat1 = htmlspecialchars($_POST['cat1']);
		        if ($id == 0)
	        		$elem = $id.';'.$name.';'.$img.';'.$desc.';'.$cat.','.$cat1.';'.$stock.';'.$prix;
	        	else 
	        		$elem = "\n".$id.';'.$name.';'.$img.';'.$desc.';'.$cat.','.$cat1.';'.$stock.';'.$prix;
        	}
        	else{
	        	if ($id == 0)
	        		$elem = $id.';'.$name.';'.$img.';'.$desc.';'.$cat.';'.$stock.';'.$prix;
	        	else 
	        		$elem = "\n".$id.';'.$name.';'.$img.';'.$desc.';'.$cat.';'.$stock.';'.$prix;
			}            
            $file = fopen("stock.csv", "a+");
			fwrite($file, $elem);
			fclose($file);
			echo "<html><body> <h4 class ='crea'>OK, produit complet</h4> </body></html>";
        } 
    else 
    {
        echo "<html><body> <h4 class ='crea'>ERROR, veuillez remplir tous les champs correctements</h4> </body></html>";
    }
}
?>

<br><br>
<table class="crea">
	<tr>
		<td>id</td>
		<td>Article</td>
		<td>url_img</td>
		<td>description</td>
		<td>categorie</td>
		<td>stock</td>
		<td>prix</td>
	</tr>
<?php
$data = file("stock.csv");
$i = 0;
while (isset($data[$i])) {
	$list = explode(";", $data[$i]);
	$list[6] = str_replace("\n", "", $list[6]);
	$list[3] = str_replace("<br/>", "\n", $list[3]);
	?>
	<tr>
		<td><?= $list[0]; ?></td>
		<td><?= $list[1]; ?></td>
		<td><?= $list[2]; ?></td>
		<td><?= $list[3]; ?></td>
		<td><?= $list[4]; ?></td>
		<td><?= $list[5]; ?></td>
		<td><?= $list[6]; ?></td>
	</tr>
	<?php
	$i++;
}
?>
</table>
<a class="crea" href="modifarticle.php"><h3>Modifier un produit</h3></a>
<a class="crea" href="suparticle.php"><h3>supprimer un produit</h3></a>
</div>
</div>
</body>
</html>