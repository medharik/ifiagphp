<meta charset="utf-8">
<?php 
include_once 'Helper.php';
extract($_POST);//extraire les infos du form : $libelle , $prix
ajouter_produit($libelle, $prix);
header("location:new.php?add=ok");
 ?>