<?php
	require_once './phpClass/Cfactory.php';
	require_once './conf/dataBase.php';
	require_once './phpClass/Cftp.php';
	require_once './phpClass/CKey.php';
	require_once './phpClass/CMail.php';
	require_once './conf/backup.php';

	use factory\factory;
	use PDO;
	use key\CKey;
	use mail\CMail;
	use conf\backup;
	use ftp\Cftp;
	use conf\dataBase;

	$bdd = new factory(dataBase::DSN, dataBase::DBNAME, dataBase::USER, dataBase::PASS, dataBase::TYPE);
	$myFtp = new Cftp();
	$myKey = new CKey();
	$keySecurity = $myKey->getKey();
	$MyEmail = new CMail();

	$myFtp->checkDate($site);
	$allSite = $bdd->query("SELECT * FROM list_site");
	$statusBackup = $bdd->query("SELECT * FROM list_site WHERE backup_active = 0");
	if(count($statusBackup  == 0))
	{
		$bdd->query("UPDATE list_site SET backup_active=0 WHERE 1");
	}
	foreach ($allSite as $site)
	{
		if($site['backup_active'] == 0)
		{
			$hooks2 = array(
				array($site['ftp_srv'],PDO::PARAM_INT)
			);
			$siteFTP = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks2);
			$loopAttemptBackup=0;

			$error = 0;
			$myBackup = $myFtp->urlExists($site['addr']);
		}
		if(!$myBackup)
		{
			while(!$myBackup || $i < backup::BACKUPMAXATTEMP )
			{
				$i++;
				if($i == backup::BACKUPMAXATTEMP && !$myBackup)
				{
					$MyEmail->send_email_error($site['name'], "Pas réponse du site ciblée");
					die();
				}
			}
		}
		if($myBackup)
		{
			$active1=1;
			$chName = curl_init();
			$postDataName = array(
					'sFormValidator' => $keySecurity,
					'checkName' => $active1
				);

			curl_setopt($chName , CURLOPT_URL,$site[0]['addr']."backup/back.php");
			curl_setopt($chName , CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($chName , CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($chName , CURLOPT_TIMEOUT, 5);
			curl_setopt($chName , CURLOPT_DNS_USE_GLOBAL_CACHE, false);
			curl_setopt($chName , CURLOPT_DNS_CACHE_TIMEOUT, 1);
			curl_setopt($chName , CURLOPT_POST, true);
			curl_setopt($chName , CURLOPT_TIMEOUT,0);
			curl_setopt($chName , CURLOPT_POSTFIELDS, $postDataName);
			curl_setopt($chName , CURLOPT_RETURNTRANSFER, true);

			$dataName = curl_exec($chName);
			$httpcodeName = curl_getinfo($chName , CURLINFO_HTTP_CODE);
			curl_close($chName);
			
			$myFtp->updateBdd($dataName, $site['name'], 'save/');
	
			$connectOk = $myFtp->connectionFTP($siteFTP[0]['addr_srv'], $siteFTP[0]['ftp_user'], $siteFTP[0]['ftp_password']);
			if($connectOk)
			{
				$active = 1;
				 	$postDate = array(
					'sFormValidator' => $keySecurity,
					'sCreateBackup' => $active
				);
				//CrÃ©ation du backup
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$site['addr']."backup/back.php");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_TIMEOUT, 5);
				curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
				curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_TIMEOUT,0);
				curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$data = curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);

				$dirUplods = "tempUploads/";
				if ($handle = opendir($dirUplods)) {
					while (false !== ($entry = readdir($handle))) {
						if ($entry != "." && $entry != "..") {
							$dezip = str_replace(".zip", "", $entry);
							$myFtp->checkDate($dezip);
							$rt = $myFtp->createNameFile($dezip, $entry,$dirUplods);
							if($rt)
							{
								//echo 'swal("Notification!", "Backup du site: '.$site['name'].' effectuer!", "success");';
								$MyEmail->send_email_sucess($site['name']);
								unlink($dirUplods.$entry);
							}
							else
							{
								$myFtp->insertBdd($site[0]['name'], "null", "echec","");
								$MyEmail->send_email_error($site['name'], "Echec de la crÃ©ation du backup");
								//echo 'swal("Echec!", "1Echec de la crÃ©ation du backup du site '.$site['name'].'!", "error");';

							}
							$myFtp->logoutFTP();
						}
					}
					closedir($handle);
				}
			}
			else
			{
				$MyEmail->send_email_error($site['name'], "Echec de la création du backup du site".$site['name'].",Connection impposible avec le serveur de sauvegarde!");
			}
		}
	}
?>
