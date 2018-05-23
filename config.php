<?php 
define('DSN',"mysql:host=localhost;dbname=ifiagdb");
define('USER',"root");
define('PASSE',"");
define('MAX_SIZE',8000000);
$options=array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'");	
 ?>