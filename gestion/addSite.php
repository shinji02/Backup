<?php

require_once '../phpClass/Cftp.php';
require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';
use ftp\Cftp;
use factory\factory;
use PDO;
use conf\dataBase;

if(isset($_POST['nameSite']) && isset($_POST['addrSite']) && isset($_POST['selectServeur']))
{
	if(!empty($_POST['nameSite']) && !empty($_POST['addrSite']) && !empty($_POST['selectServeur']))
	{
		$bd = factory::getInstance();
		$hooks = array(
			array($_POST['nameSite'], PDO::PARAM_STR),
			array($_POST['addrSite'], PDO::PARAM_STR),
			array($_POST['selectServeur'], PDO::PARAM_INT),
		);
		
		$bd->query("INSERT INTO list_site (name,addr,ftp_srv) VALUES(?,?,?)",$hooks);
		//echo is_dir("../uploads/".$_POST['nameSite']);
		if(!is_dir('../save/'.$_POST['nameSite']))
		{
			mkdir('../save/'.$_POST['nameSite']);
		}
		echo "swal('Crée', 'Le site Web à été crée', 'success')
						.then((value) => {
						  window.location.href = 'index.php?page=PsiteWeb';
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
