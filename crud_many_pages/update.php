<?php 
include_once 'Helper.php';
extract($_POST);

modifier_produit($libelle, $prix, $id);
header("location:index.php?upd=ok");
 ?>