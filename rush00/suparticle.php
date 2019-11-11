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
    <?php include 'navbar.php'; ?>
    <nav>
        <ul id="admin_panel">
            <li><a href="admin_user.php">Users management</a></li>
            <li><a href="stock.php">Article management</a></li>
            <li id="last"><a href="sales_logs.php">Sell logbook</a></li>
        </ul>
    </nav>
    <br><br>
<?php
// Lecture du fichier CSV en mode W.
if (isset($_POST['submit'])){
    if (isset($_POST['id']) AND !empty($_POST['id'])){
        if ($monfichier = fopen('stock.csv', 'r'))
        {
        $row = 0; // Variable pour numéroter les lignes
        $newcontenu = '';
        // Variable contenant la nouvelle ligne :
        $elem = "\n";
        // Lecture du fichier ligne par ligne :
        while (($ligne = fgets($monfichier)) !== FALSE)
        {
            // Si le numéro de la ligne est égal au numéro de la ligne à modifier :
            if ($row == $_POST['id'])
            {
                $newcontenu = $newcontenu.$elem;
            }
            // Sinon, on réécri la ligne
            else
            {
                $newcontenu = $newcontenu.$ligne;
            }
            $row++;    
        }
        fclose($monfichier);
        $fichierecriture = fopen('stock.csv', 'w');
        fputs($fichierecriture, $newcontenu);
        fclose($fichierecriture);
        }   
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

<div class="modif">
<h3>Supprimer un produit</h3>
    <br>
<form action="" method="post">
    id : <input type="number" name="id">
    
    <input type="submit" name="submit" value="OK">
</form>
</div>
<a class="crea" href="stock.php"><h3>Ajouter un produit</h3></a>
<a class="crea" href="modifarticle.php"><h3>Modifier un produit</h3></a>
</body>
</html>