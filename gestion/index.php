<?php
require_once '../phpClass/Cfactory.php';
require_once '../conf/dataBase.php';
require_once '../phpClass/Csmarty.php';
require_once '../conf/siteConf.php';
require_once '../phpClass/Cftp.php';
require_once '../phpClass/CKey.php';

//namespace
use factory\factory;
use MySmarty\MySmarty;
use ftp\Cftp;
use conf\siteConf;
use PDO;
use key\CKey;

session_start();

if(!isset($_SESSION['connect']))
{
	header("Location: ../index.php");
}

$mySmarty = new MySmarty();
$bdd = factory::getInstance();
$ftp = new Cftp();
$key = new CKey();

$vars = array();

if(isset($_GET['page']) AND !empty($_GET['page']))
{
	if($_GET['page'] == "PsiteWeb")
	{
		$vars['nameSiteWeb'] = siteConf::SITENAME;

		$rep = $bdd->query("SELECT * FROM list_site");

		$vars['listSite']=$rep;
		$mySmarty->assign('vars', $vars);

		$respSrv = $bdd->query("SELECT * FROM srv_ftp");		
		$mySmarty->assign('srv',$respSrv);
		if(isset($_GET['modif']) && isset($_GET['idSite']) && $_GET['modif'] == 1)
		{
			$hooks = array(
				array($_GET['idSite'], PDO::PARAM_INT),
			);
			$respInfoSite = $bdd->query("SELECT * FROM list_site WHERE id=?",$hooks);
			foreach ($respInfoSite as $valueSiteInfo) {
				$hooks2 = array(
					array($valueSiteInfo['ftp_srv'], PDO::PARAM_INT),
				);
			}
			$respFftpSrv = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks2);
			$mySmarty->assign("infoSite",$valueSiteInfo);
			$mySmarty->assign("ftpInfo",$respFftpSrv[0]);
		}
		else if(isset($_GET['delete']) && isset($_GET['idSite']) && $_GET['delete'] == 1)
		{
			$hooks = array(
				array($_GET['idSite'],PDO::PARAM_INT)
			);
			$siteIsDelte = $bdd->query("SELECT * FROM list_site WHERE id=?",$hooks);
			var_dump($siteIsDelte);
			
			
			if(is_dir('../uploads/'.$siteIsDelte[0]['name']))
			{
				rmdir('../uploads/'.$siteIsDelte[0]['name']);
			}
			
			$bdd->query("DELETE FROM list_site WHERE id=?",$hooks);
			
			header("Location:index.php?page=PsiteWeb");
			
		}
		
		$mySmarty->display("../templates/admin/PsiteWeb.tpl"); 
	}
	else if($_GET['page'] == "Pgestion")
	{
		$backupList=array();
		$vars['nameSiteWeb'] = siteConf::SITENAME;
		$listSite =$bdd->query("SELECT * FROM list_site");
		$allSite =$bdd->query("SELECT * FROM list_site");
		if(isset($_GET['idSite']) && $_GET['idSite'] != null)
		{
		
			$hooks = array(
				array($_GET['idSite'],PDO::PARAM_INT),
			);
			$site = $bdd->query("SELECT * FROM list_site WHERE id=?",$hooks);
			$allSite = $site;
			$hooks2 = array(
					array($site[0]['ftp_srv'],PDO::PARAM_INT),
			);	
			$ftp_server = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks2);
			$hook = array(
					array($site[0]['id'], PDO::PARAM_INT),
			);
			$allBackupSite = $bdd->query("SELECT * FROM history_backup WHERE id_site=?",$hook);
			foreach ($allBackupSite as $backup) {
				$backupList[] = $backup;
			}
		}
		else if(isset($_GET['date']) && $_GET['date'] != null)
		{
			
			foreach ($listSite as $site)
			{
				$hook = array(
					array($site['id'], PDO::PARAM_INT),
					array($_GET['date'].' 00:00:00', PDO::PARAM_STR),
					array($_GET['date'].' 23:59:59', PDO::PARAM_STR),
				);
				$allBackupSite = $bdd->query("SELECT * FROM history_backup WHERE id_site=? AND `date` > ? AND `date`< ?",$hook);
				foreach ($allBackupSite as $backup) {
					$backupList[] = $backup;
				}
			}
		}
		else
		{
			$allSite =$bdd->query("SELECT * FROM list_site");
			$i=1;;
			foreach ($allSite as $site)
			{
				$hooks2 = array(
					array($site['ftp_srv'],PDO::PARAM_INT),
				);		
				$ftp_server = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks2);
				$hook = array(
					array($site['id'], PDO::PARAM_INT),
				);
				$allBackupSite = $bdd->query("SELECT * FROM history_backup WHERE id_site=?",$hook);
				foreach ($allBackupSite as $backup) {
					$backupList[] = $backup;
				}

			}
		}
			
		$mySmarty->assign("backup",$backupList);
		$mySmarty->assign('site', $allSite);
		$mySmarty->assign('listSite', $listSite);
		$mySmarty->assign('vars', $vars);
		$mySmarty->display("../templates/admin/Pgestion.tpl");
	}
	else if($_GET['page'] == "Psrv")
	{
		$vars['nameSiteWeb'] = siteConf::SITENAME;

		$repInfoSrvFtp = $bdd->query("SELECT * FROM srv_ftp");
		
		if(count($repInfoSrvFtp) > 0)
		{
			$mySmarty->assign('ftp', $repInfoSrvFtp);
		}
		else
		{
			$msg="Aucun serveur de sauvegarde enregistré";
			$mySmarty->assign('info', $msg);
		}
		
		if(isset($_GET['modif']) && isset($_GET['idSrv']))
		{
			$hooks = array(
				array($_GET['idSrv'],PDO::PARAM_INT),
			);
			$repSrvModif = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks);
			$mySmarty->assign('srvMofif',$repSrvModif);
		}
		
		if(isset($_GET['delete']) && isset($_GET['delete']))
		{
			$hooks = array(
				array($_GET['idSrv'],PDO::PARAM_INT),
			);
			$bdd->query("DELETE FROM srv_ftp  WHERE id=?",$hooks);
			header("Location:index.php?page=Psrv");
		}
			
		$mySmarty->assign('vars', $vars);
		
		$mySmarty->display("../templates/admin/Psrv.tpl");
	}
	
}
else
{
	$vars['nameSiteWeb'] = siteConf::SITENAME;

	$rep = $bdd->query("SELECT * FROM list_site");
	$repSrvList = $bdd->query("SELECT * FROM  srv_ftp");
	
	$vars['numberSie'] = $ftp->count_array($rep); 
	$vars['numberSrvSite'] = $ftp->count_array($repSrvList);
	$vars['key'] = $key->getKey();
	$mySmarty->assign('vars', $vars);

	$mySmarty->display("../templates/admin/Pdashborad.tpl");
}