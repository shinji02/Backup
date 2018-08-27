<?php

require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';

use factory\factory;
use ftp\Cftp;

$bdd = factory::getInstance();

if(isset($_POST['emailSucess']) && isset($_POST['emailError']) && isset($_POST['emailInfo']))
{
	$hooks = array(
		array($_POST['emailSucess'],PDO::PARAM_BOOL),
		array($_POST['emailError'],PDO::PARAM_BOOL),
		array($_POST['emailInfo'],PDO::PARAM_BOOL),
	);
	
	$bdd->query("UPDATE `options` SET send_email_success=?,send_email_error=?,send_email_info=? WHERE id_options=1",$hooks);
	echo 'swal("Modification!", "La modification vient d\'étre effectuer!", "success")';
}
else
{
	echo 'swal("Error!", "Une erreur est survenu!", "error")';
}