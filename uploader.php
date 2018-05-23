<?php 
include_once 'Helper.php';
$chemin="";
if(isset($_FILES['tof1'])){
$chemin=	charger_fichier($_FILES['tof1']);
$resultat=strstr($chemin,'/');//retourne false(vide) s'il ne trouve pas de /
if(empty($resultat)){
	echo $chemin;

}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>upload de fichier</title>
</head>
<body>
	
	<form action="uploader.php" method="post" enctype="multipart/form-data">
		<input type="file" name="tof1">
		<button>Valider</button>

	</form>
</body>
</html>