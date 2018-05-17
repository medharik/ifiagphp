<?php 
include_once 'config.php';
function connecter_db(){
$cnx = new PDO(DSN, USER, PASSE);
return $cnx;
}
function ajouter_produit($libelle,$prix,$chemin){
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into produit (libelle, prix,chemin) values (?,?,?)");
	$rp->execute(array($libelle,$prix,$chemin));
}
function supprimer($id,$table){
	$cnx=connecter_db();
	$rp=$cnx->prepare("delete from $table where id = ?");
	$rp->execute(array($id));
}

function modifier_produit($libelle,$prix,$id){
	$cnx=connecter_db();
	$rp=$cnx->prepare("update produit set libelle =?, prix=? where id=?");
	$rp->execute(array($libelle,$prix,$id));
}

function get_all($table){
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table");
	$rp->execute(array());
	$data=$rp->fetchAll();
return $data;
}
function get($id,$table){
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table where id=?");
	$rp->execute(array($id));
	$data=$rp->fetch();
return $data;
}
function charger_fichier($infos){
$nom=$infos['name'];
$tmp=$infos['tmp_name'];
$i=pathinfo($nom);
$extension=$i['extension'];
$autorise=array('png','jpg','jpeg','gif','pdf');
 $taille=filesize($tmp);
if (!in_array(strtolower($extension), $autorise)){
return ("ce n'est pas une image");
}else if($taille> MAX_SIZE){
return ('ce fichier est trop volumineux , la taille max est '.MAX_SIZE.'');
}

$new_name=md5(date('Y_m_dHis')."_".rand(0, 99999)).".$extension";
$chemin="uploads/$new_name";

if(move_uploaded_file($tmp, $chemin)){

 return $chemin;
}else {
	return ("Une erreur est survenue lors de l'upload du fichier , veuillez réessayer");
}
}
 ?>