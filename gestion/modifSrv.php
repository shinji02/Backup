<?php
require_once '../phpClass/Cftp.php';
require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';

use factory\factory;
use PDO;
if(isset($_POST['idSrv']) && isset($_POST['srvAddr']) && isset($_POST['srvName']) && isset($_POST['srvUser']) && isset($_POST['srvPassword']) && isset($_POST['srvPort']))
{
	if(!empty($_POST['idSrv']) && !empty($_POST['srvAddr']) && !empty($_POST['srvName']) && !empty($_POST['srvUser']) && !empty($_POST['srvPassword']) && !empty($_POST['srvPort']))
	{
		$bdd = factory::getInstance();
		$hooks = array(
			array($_POST['srvName'], PDO::PARAM_STR),
			array($_POST['srvAddr'], PDO::PARAM_STR),
			array($_POST['srvUser'], PDO::PARAM_STR),
			array($_POST['srvPassword'], PDO::PARAM_STR),
			array($_POST['srvPort'], PDO::PARAM_STR),
			array($_POST['idSrv'], PDO::PARAM_INT),
		);
		
		$bdd->query("UPDATE srv_ftp SET name__srv=?,addr_srv=?,ftp_user=?,ftp_password=?,ftp_port=? WHERE id=?",$hooks);
		echo "swal('Mofiication','Modification du serveur de sauvegarde effectuer','success')
						.then((value) => {
						  window.location.href = 'index.php?page=Psrv&modif=1&idSrv=".$_POST['idSrv']."';
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