<?php

require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';

use factory\factory;
use PDO;
use ftp\Cftp;

$bdd = factory::getInstance();

if($_POST['email'] == 0)
{
	$hooks = array(
		array($_POST['emaim'], PDO::PARAM_BOOL),
	);
	$bdd->query("INSERT INTO `options` VALUES(?)");
	echo 'swal("Modification!", "Modification effectuer!", "error");';
}
else if($_POST['email'] == 1)
{
	
}