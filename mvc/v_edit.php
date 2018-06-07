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
	<title>edition du produit</title>
</head>
<body>
	<h3>modification du produit : </h3>
	<form action="c.php?a=update&t=produit" method="post" >	
		<input type="hidden" name="id" value="<?php echo $produit->id ?>">
		Libellé : <input type="text" name="libelle" required="" value="<?php echo $produit->libelle ?>">
		Prix : <input type="number" name="prix" required value="<?php echo $produit->prix ?>">
		<button >Valider</button>
	</form>
</body>
</html>