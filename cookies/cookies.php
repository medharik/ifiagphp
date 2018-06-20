<?php 
if (isset($_GET['p'])){
setcookie("produit",$_GET['p'],time()+20);
}
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>



 	<a href="cookies.php?p=hp">HP</a><br>
 	<a href="cookies.php?p=dell">DELL</a>

<br>
<?php if (count($_COOKIE)>0 && isset($_COOKIE['produit'])): ?>
dernier produit  consulté : 	<?php echo $_COOKIE['produit'] ?>
<?php endif ?>


 </body>
 </html>