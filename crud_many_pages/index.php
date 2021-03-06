<?php 
include_once 'Helper.php';
$produits=get_all("produit");
extract($_GET);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>liste des produits</title>

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
  </head>
  <body>

  
    <div class="container">
      <h1 align="center" class="alert alert-info"> Liste des produits</h1>
     <?php if (isset($del) && $del=='ok'): ?>
       <div class="alert alert-danger" >
         Suppression effectuée avec succès
        </div>
     <?php endif ?>
     <?php if (isset($upd) && $upd=='ok'): ?>
       <div class="alert alert-danger" >
         Modification effectuée avec succès
        </div>
     <?php endif ?>

    <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>libellé</th>
                <th>prix</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produits as $p): ?>
                 <tr>
                <td><?php echo $p['id']; ?></td>
                <td><?php echo $p['libelle']; ?></td>
                <td><?php echo $p['prix']; ?></td>
                <td><a href="delete.php?id=<?php echo $p['id']; ?>" class="btn btn-xs btn-danger"  onclick="return confirm('supprimer?')" >Supprimer</a>
<a href="edit.php?id=<?php echo $p['id']; ?>" class="btn btn-xs btn-warning">Modifier</a>
<a href="show.php?id=<?php echo $p['id']; ?>" class="btn btn-xs btn-info">Consulter</a>
                </td>
              </tr>
              <?php endforeach ?>
             
            
            </tbody>
          </table>
</div>
   </body>
</html>