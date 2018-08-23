<?php 
require_once './phpClass/Cfactory.php';
require_once './conf/dataBase.php';
require_once './phpClass/Csmarty.php';
require_once './conf/security.php';

//namespace
use factory\factory;
use conf\dataBase;
use MySmarty\MySmarty;
use conf\security;


if(isset($_GET['connect']) && ($_GET['connect'] != null))
{
	session_start();
	if(isset($_POST['passwordConnect']) && ($_POST['passwordConnect'] != null))
	{
		if($_POST['passwordConnect'] == security::PASSWORD)
		{
			$_SESSION['connect'] = 1;
			echo "window.location.href = 'gestion/';";
		}
		else
		{
			echo 'swal("Erreur!", "Mot de passe incorrect!", "error")';
		}
	}
	else
	{
		echo 'swal("Erreur!", "Vous avez précisez aucun mot de passe!", "error")';
	}
}
else if(isset ($_GET['deconnect']) && ($_GET['deconnect'] != null))
{
	session_start();
	session_destroy();
	header("Location: index.php");
}
else
{
	$bd = new factory(dataBase::DSN, dataBase::DBNAME, dataBase::USER, dataBase::PASS, dataBase::TYPE);
	$smarty = new MySmarty();
	$smarty->display("login.tpl");
}