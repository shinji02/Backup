<?php
require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';
require_once '../phpClass/Cftp.php';

use factory\factory;
use PDO;
use ftp\Cftp;

$bdd = factory::getInstance();
if(isset($_POST['srvName']) && isset($_POST['srvAddr']) && ($_POST['srvUser']) && ($_POST['srvPassword']) && ($_POST['srvPort']))
{
	if(!empty($_POST['srvName']) && !empty($_POST['srvAddr']) && ($_POST['srvUser']) && ($_POST['srvPassword']) && ($_POST['srvPort']))
	{
		$hooks = array(
			array($_POST['srvName'], PDO::PARAM_STR),
		);
		$verifSrvDispo = $bdd->query("SELECT * FROM srv_ftp WHERE name__srv=?",$hooks);
		if(count($verifSrvDispo) ==0)
		{
			$ftp = new Cftp();
			$rep = $ftp->urlExists($_POST['srvAddr']);
			if($rep == true)
			{
					$rep = $ftp->connectionFTP($_POST['srvAddr'], $_POST['srvUser'], $_POST['srvPassword'], $_POST['srvPort']);
					if($rep == true)
					{
						$hooks2 = array(
							array($_POST['srvName'], PDO::PARAM_STR),
							array($_POST['srvAddr'], PDO::PARAM_STR),
							array($_POST['srvUser'], PDO::PARAM_STR),
							array($_POST['srvPassword'], PDO::PARAM_STR),
							array($_POST['srvPort'], PDO::PARAM_INT),
						);
						
						$bdd->query("INSERT INTO srv_ftp (name__srv,addr_srv,ftp_user,ftp_password,ftp_port) VALUES (?,?,?,?,?)",$hooks2);
					
						
						echo 
						"swal('Création','Création du serveur de sauvegarde effectuer','success')
							.then((value) => {
							window.location.href = 'index.php?page=Psrv';
						});";
					}
					else
					{
						echo 'swal("Error!", "Echec de la connection aux serveur FTP (Utilisateur ou mot de passe incorrect)!", "error");';
					}
			}
			else
			{
				echo 'swal("Error!", "L\'addresse du serveur n\'est pas valide!", "error");';
			}
			$ftp->logoutFTP();
		}
		else
		{
			echo 'swal("Error!", "Le nom du serveur est deja utiliser!", "error");';
		}
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
