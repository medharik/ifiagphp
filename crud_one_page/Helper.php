<?php 
include_once 'config.php';
function connecter_db(){
$cnx = new PDO(DSN, USER, PASSE);
return $cnx;
}
function ajouter_produit($libelle,$prix){
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into produit (libelle, prix) values (?,?)");
	$rp->execute(array($libelle,$prix));
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
 ?>