<?php
include("constantes.php");
/*
SDBSERVER
SDBBASE
SDBLOGIN
SDBPASSWORD
*/
try{
	$bdd = new PDO('mysql:host='.SDBSERVER.'; dbname='.SDBBASE, SDBLOGIN, SDBPASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}catch(Exception $e){
	die('Erreur  : ' . $e->getMessage().' <br>Numéro erreur depuis connect_db.php : '.$e->getCode());
}

?>