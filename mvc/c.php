<?php 
include "m.php";
include "utils.php";
/*action => a
table =>t
data<=>POST,GET
id=>*/
extract($_GET);//$a,$t
extract($_POST);//$libelle,$prix
switch ($a) {
	case 'create':
		ajouter($t, $_POST);
		break;

		case 'delete':
		supprimer($id, $t);
		break;
		case 'show':
		vers("v_show.php?id=$id");
		break;
		case 'edit':
		vers("v_edit.php?id=$id");
		break;
		case 'update':
		modifier($t,$_POST, $id);
		break;	
		default:
		// code...
		break;
}


vers("v_produits.php?action=$a");

 ?>