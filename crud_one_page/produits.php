<?php 
include_once 'Helper.php';
$table ="produit";
$message="";
$btn="ajouter";
$classbtn="primary";
//var_dump($_POST);
$page=basename(__FILE__);
extract($_POST);//$libelle<=>$_POST['libelle'] , $prix
extract($_GET);
// si add
if(isset($libelle) && isset($prix) && !isset($idm) ){
  //debut code upload
  $chemin="";
if(isset($_FILES['photo'])){
$chemin=  charger_fichier($_FILES['photo']);
$resultat=strstr($chemin,'/');//retourne false(vide) s'il ne trouve pas de /
if(empty($resultat)){
 // echo $chemin;

}else {
  ajouter_produit($libelle, $prix,$chemin);
$op="add";
header("location:$page?op=$op");

}
}
//fin code upload


}
//si delete
if(isset($ids)){
	supprimer($ids, $table);
	$op="del";
header("location:$page?op=$op");
}
// si show
if(isset($idc)){
	$produit_consulter=get($idc,$table);
//	var_dump($produit_consulter);

}

//si modif
	if (isset($libelle) && isset($prix) && isset($idm)){
		modifier_produit($libelle, $prix, $idm);
	$op="upd";
header("location:$page?op=$op");
	}



//si edit
if(isset($ide)){
	$produit_editer=get($ide,$table);
	$btn="modifier";
$classbtn="warning";
//	var_dump($produit_consulter);

}

if(isset($op))
switch ($op) {
	case "add":
		$message="Ajout effectué avec succès";
		$class="info";
		break;
		case "del":
		$message="Suppression effectuée avec succès";
		$class="danger";
		break;
		case "upd":
		$message="Modification effectuée avec succès";
		$class="warning";
		break;
	default:
		// code...
		break;
}
$produits=get_all($table);
 ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edition des produits</title>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Bootstrap -->
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  	<?php include_once 'menu.html'; ?>
    <div class="container">
    	<?php if (isset($op) ): ?>
  		<div class="alert alert-<?=$class ?>" align="center"><?=$message; ?>
  		</div>
  	<?php endif ?>
 
<?php 
if(isset($chemin ) &&  empty($resultat)){
  echo $chemin;

}

 ?>
    	<div class="col-sm-6">
  <form class="form-horizontal" action="<?= basename(__FILE__) ?>" method="post" enctype="multipart/form-data">
  	<?php if (isset($produit_editer)): ?>
  		<input type="text" name="idm"
  		 value="<?php echo $produit_editer['id']; ?>">
  	<?php endif ?>
<fieldset>

<!-- Form Name -->
<legend>Nouveau produit :</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="libelle">Libellé</label>  
  <div class="col-sm-8">
  <input id="libelle" name="libelle" type="text" placeholder="" class="form-control input-sm" required=""

 value="<?php if(isset($produit_editer)) echo $produit_editer['libelle'] ?>" 
  >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="prix">Prix</label>  
  <div class="col-sm-8">
  <input id="prix" name="prix" type="text" placeholder="0" class="form-control input-sm" required="" value="<?php if(isset($produit_editer)) echo $produit_editer['prix'] ?>" >
  <span class="help-block">En DH</span>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="photo">Image </label>  
  <div class="col-sm-8">
  <input id="prix" name="photo" type="file"  class="form-control input-sm"  >
   
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-sm-4 control-label" for=""></label>
  <div class="col-sm-4">
    <button id="" name="" class="btn btn-<?=$classbtn?>">
    	<?=$btn ?></button>
  </div>
</div>

</fieldset>
</form>

    	</div>
    	<!-- fin form -->
<?php if (isset($produit_consulter)): ?>
	<div class="col-sm-6">
		<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
              	<?=$produit_consulter['libelle'];?></h3>
            </div>
            <div class="panel-body">
             prix : <?=$produit_consulter['prix'] ?> DHS
            </div>
          </div>
		
		 
	</div>
<?php endif ?>

    </div>

<hr>
<div class="container">
	<table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

<?php foreach ($produits as $l): ?>
	<tr>
                <td><?= $l['id']; ?></td>
                <td><img src="<?= $l['chemin']; ?>" width="200"></td>
                <td><?= $l['libelle']; ?></td>
                <td><?= $l['prix']; ?></td>
                <td><a onclick="return confirm('vous voulez vraiment supprimer cet élément')" href="produits.php?ids=<?= $l['id']; ?>" class="btn btn-sm btn-danger">Supprimer</a>
                <a href="produits.php?ide=<?= $l['id']; ?>" class="btn btn-sm btn-warning">Editer</a>
                <a href="produits.php?idc=<?= $l['id']; ?>" class="btn btn-sm btn-info">Consulter</a></td>
              </tr>
<?php endforeach ?>
              


             
            </tbody>
          </table>
</div>

   </body>
</html>