<?php 
include_once "utils.php";
include_once "m.php";
extract($_GET);//$id
$produit=get($id, "produit");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>consultation du produit : <?=$produit->libelle ?></title>
</head>
<body>
	<h2>Libellé : <?=$produit->libelle ?></h2>
	<h3>Prix est : <?=$produit->prix ?>DHS</h3>
<?php retour("Retour"); ?>
</body>
</html>