<?php 
include_once 'config.php';
function connecter_db(){
	try{

		$options=array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'");	
	$cnx = new PDO(DSN, USER, PASSE,$options);
		return $cnx;	
	}catch(PDOException $e){
   die("Erreur de connexion db ".$e->getMessage());
	}

}
function intero($v){
return '?';
}
// add ad-hoc, 
//exemple sur $data=array('lib'=>'hp','prix'=>5000)
function  ajouter($table,$data=array()){
$k=join(',',array_keys($data));//lib,prix
$interogations=join(',',array_map('intero', $data));//?,?
$sql="insert into $table ($k) values ($interogations)";
$valeurs=array_values($data);//array(hp,5000)
	try{
		$cnx=connecter_db();
	$rp=$cnx->prepare($sql);
	$rp->execute($valeurs);
}catch(PDOException $e){
   die("Erreur d'ajout $table  ".$e->getMessage());
}
}
function fusion($v){
return "$v=?";
}
//update ad-hoc
//exemple sur $data=array('lib'=>'hp','prix'=>5000) pour le produit ayant id=8
//update produit set lib=? , prix=? where id = ?
function  modifier($table,$data,$id,$id_name="id"){
$sets="set ".join(',',array_map('fusion',array_keys($data))). " where $id_name=?";
$valeurs=array_values($data);
$valeurs[]=$id;
$sql="update $table $sets";
try{
		$cnx=connecter_db();
	$rp=$cnx->prepare($sql);
	$rp->execute($valeurs);
}catch(PDOException $e){
   die("Erreur d'ajout produit  ".$e->getMessage());
	}
}
function supprimer($id,$table,$id_name="id"){
//	supprimer(1,"produit")
	try{
			$cnx=connecter_db();
	$rp=$cnx->prepare("delete from $table where $id_name = ?");
	$rp->execute(array($id));
}catch(PDOException $e){
die($e->getMessage());
}
}
function get_all($table){
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table");
	$rp->execute(array());
	$data=$rp->fetchAll();
return $data;
}
//get ^par id
function get($id,$table,$id_name="id"){
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table where $id_name=?");
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