<?php
require_once '../phpClass/Cftp.php';
require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';

use ftp\Cftp;
use factory\factory;
use PDO;
use conf\dataBase;

if(isset($_POST['nameSite']) && isset($_POST['addrSite']))
{
	if(!empty($_POST['nameSite']) && !empty($_POST['addrSite']))
	{
		$db = \factory\factory::getInstance();
		$hooks = array(
			array($_POST['nameSite'], PDO::PARAM_STR),
			array($_POST['addrSite'], PDO::PARAM_STR),
			array($_POST['id'], PDO::PARAM_INT),
		);
		$db->query("UPDATE list_site SET name=?,addr=? WHERE id=?",$hooks);
					
		echo "swal('Modification effectuer!', 'La modification à bien été pris en compte!', 'success')
						.then((value) => {
						  window.location.href = 'index.php?page=PsiteWeb&modif=1&idSite=".$_POST['id']."';
						});";
					
	}
	else
	{
		echo 'swal("Error!", "Vous devez remplir tout les champs!", "error");';
	}
}
else
{
	echo 'swal("Error!", "Vous devez remplir tout les champs!", "error");';
}