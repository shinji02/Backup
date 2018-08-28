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


session_start();
if(isset($_GET['connect']) && ($_GET['connect'] != null))
{
	if(isset($_POST['passwordConnect']) && ($_POST['passwordConnect'] != null && $_POST['usernameConnect']) && ($_POST['usernameConnect'] != null))
	{
		$hooks = array(
			array($_POST['usernameConnect'], PDO::PARAM_STR),
			array(sha1($_POST['passwordConnect']), PDO::PARAM_STR)
		);
		$bdd = factory::getInstance();
		$auth = $bdd->query("SELECT COUNT(*) FROM account WHERE `user`=? AND password=?",$hooks);
		if($auth[0]['COUNT(*)'] ==1)
		{
			$_SESSION['connect'] = 1;
			echo "window.location.href = 'gestion/';";
		}
		else
		{
			echo 'swal("Erreur!", "Utilisateur ou Mot de passe incorrect!", "error")';
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
	if(isset($_SESSION['connect']) && $_SESSION['connect'] === 1)
	{
		header("Location:gestion/");
	}
	$bd = new factory(dataBase::DSN, dataBase::DBNAME, dataBase::USER, dataBase::PASS, dataBase::TYPE);
	$smarty = new MySmarty();
	$smarty->display("login.tpl");
}