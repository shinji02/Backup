<?php
	require_once '../phpClass/Cfactory.php';
	require_once '../conf/dataBase.php';
	require_once '../phpClass/Cftp.php';
	require_once '../phpClass/CKey.php';
	require_once '../phpClass/CMail.php';
	require_once '../conf/backup.php';

	use factory\factory;
	use key\CKey;
	use mail\CMail;
	use conf\backup;
	use ftp\Cftp;

	$bdd = factory::getInstance();
	$myFtp = new Cftp();
	$myKey = new CKey();
	$keySecurity = $myKey->getKey();
	$MyEmail = new CMail();
	///////////////////////////////////Récupération des information du site et du serveur de sauvergarde associées///////////////////////////
	$hooks = array(
		array($_POST['id'], PDO::PARAM_INT),
	);

	$site = $bdd->query("SELECT * FROM  list_site WHERE id=?",$hooks);
	$hooks2 = array(
		array($site[0]['ftp_srv'],PDO::PARAM_INT)
	);
	$siteFTP = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks2);

	///////////////////////////////////

	$loopAttemptBackup = 0;
	$myBackup = $myFtp->urlExists($site[0]['addr']);
	if(!$myBackup)
	{
		while(!$myBackup || $loopAttemptBackup < backup::BACKUPMAXATTEMP )
		{
			$loopAttemptBackup++;
			if($loopAttemptBackup == backup::BACKUPMAXATTEMP && !$myBackup)
			{
				echo 'swal("Erreur!", "Aucun réponse du site: '.$site[0]['name'].' !", "error")';
				die();
			}
		}
	}
	$active2=1;
	//Création du backup
	$ch2 = curl_init();
 	$postData2 = array(
        	'sFormValidator' => $keySecurity,
        	'checkSiteName' => $active2
    	);
	curl_setopt($ch2, CURLOPT_URL,$site[0]['addr']."backup/back.php");
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch2, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch2, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
	curl_setopt($ch2, CURLOPT_DNS_CACHE_TIMEOUT, 1);
	curl_setopt($ch2, CURLOPT_POST, true);
	curl_setopt($ch2, CURLOPT_TIMEOUT,0);
	curl_setopt($ch2, CURLOPT_POSTFIELDS, $postData2);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

	$data2 = curl_exec($ch2);
	$httpcode = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
	$myFtp->updateBdd($data2, $site[0]['name'], "../save/");
	curl_close($ch2);
	
		
if($myBackup)
{
	$connectOk = $myFtp->connectionFTP($siteFTP[0]['addr_srv'], $siteFTP[0]['ftp_user'], $siteFTP[0]['ftp_password']);
	if($connectOk)
	{
		$active=1;
		//Création du backup
		$ch = curl_init();
 		$postData = array(
        		'sFormValidator' => $keySecurity,
        		'sCreateBackup' => $active
    		);
		curl_setopt($ch, CURLOPT_URL,$site[0]['addr']."backup/back.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		//curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
		curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_TIMEOUT,0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		$dirUplods = "../tempUploads/";
		if ($handle = opendir($dirUplods)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {  
					$dezip = str_replace(".zip", "", $entry);
					$myFtp->checkDate($dezip);
					$rt = $myFtp->createNameFile($dezip, $entry);
					if($rt)
					{
						echo 'swal("Notification!", "Backup du site: '.$site[0]['name'].' effectuer!", "success");';
						unlink($dirUplods.$entry);
					}
					else
					{
						$myFtp->insertBdd($site[0]['name'], "null", "echec","");
						echo 'swal("Echec!", "Echec de la création du backup du site '.$site[0]['name'].'!", "error");';
						
					}
					$myFtp->logoutFTP();
				}
			}
			closedir($handle);
		}
	}
	else
	{
		echo 'swal("Echec!", "Echec de la création du backup du site'.$site[0]['name'].', Connection impposible avec le serveur de sauvegarde!", "error");';						
	}	
	
}
