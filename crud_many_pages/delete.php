<?php 
include_once 'Helper.php';
extract($_GET);//$id
supprimer($id, "produit");
header("location:index.php?del=ok");

 ?>