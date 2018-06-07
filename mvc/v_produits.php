<?php 
include_once "utils.php";
include_once "m.php";
extract($_GET);//$notice
$produits=get_all("produit");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>produits</title>
</head>
<body>
	<?php if (isset($action)): ?>
		<?= notifier($action, "produit"); ?>
	<?php endif ?>

	<form action="c.php?a=create&t=produit" method="post" >	
		Libellé : <input type="text" name="libelle" required="">
		Prix : <input type="number" name="prix" required>
		<button >Valider</button>
	</form>


<hr>
<?php //var_dump($produits); ?>
<table align="center"  width="80%">
	<tr>
		<th>libellé</th>
		<th>prix</th>
		<th>actions</th>
	</tr>

<?php foreach ($produits as $p): ?>
	<tr>
		<td><?= $p->libelle?></td>
		<td><?= $p->prix?></td>
		<td><a href="c.php?a=delete&t=produit&id=<?=$p->id?>">Supprimer</a>
		<a href="c.php?a=edit&t=produit&id=<?=$p->id?>">Editer</a>
		<a href="c.php?a=show&t=produit&id=<?=$p->id?>">Consulter</a></td>
	</tr>
<?php endforeach ?>
	
</table>

</body>
</html>