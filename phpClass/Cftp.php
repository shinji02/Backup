<?php
namespace ftp;

require_once dirname(__FILE__).'/../phpClass/Cfactory.php';
require_once dirname(__FILE__).'/../conf/backup.php';
require_once dirname(__FILE__).'/../phpClass/CPdf.php';
use factory\factory;
use PDO;
use conf\backup;
use pdf\CPdf;

set_time_limit(630);
class Cftp {
	private $ftpId = null;
	private $ftpConnect = null;
	
	private $rep = null;
	public function __construct() {
		$this->rep = array();                   
	}
	
	public function count_array($array) :int
	{
		return count($array);
	}
	
	public function checkIp($ftpAddr) : bool
	{
		if (filter_var($ftpAddr, FILTER_VALIDATE_IP)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function checkPing($ftpAddr) : bool
	{
		$fp = fsockopen($ftpAddr, 80, $errno, $errstr, 10);
		if($fp) {
			return true;
		} else {
			return false;
		}
	}
	
	function urlExists($url=NULL)  
		{  
		if($url == NULL) return false;  
		$ch = curl_init($url);  
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		$data = curl_exec($ch);  
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
		curl_close($ch);  
		if($httpcode>=200 && $httpcode<300){  
			return true;  
		} else {  
			return false;  
		}  
	}  
	
	
	/**
	 * @name Connection aux FTP
	 * 
	 * @param string $ftpAddr Addrese du FTP du site
	 * @param string $ftpUser Utilisateur du FTP
	 * @param string $ftpPassword mot de passe FTP
	 * @param int	 $ftpPort Port du ftp
	 * @return boolean true si la connectione est réussie
	 * @return boolean false si la connection est refusée
	 * **/
	
	public function connectionFTP($ftpAddr,$ftpUser,$ftpPassowrd,$ftpPort=22):bool
	{	
		$this->ftpId = ssh2_connect($ftpAddr,$ftpPort);
		
		if(ssh2_auth_password($this->ftpId,$ftpUser,$ftpPassowrd))
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	public function createNameFile($siteName,$nameFile,$dir="../tempUploads/")
	{


		$backupToday = $siteName."-".date("d")."-".date("m")."-". date("Y").'.zip';
		$linkBackup =  '/save/'.$siteName.'/'.$backupToday;
		$backupFile = '/var/www/backup/save/'.$siteName.'/'.$backupToday;
		$repsSave = $this->savefile($backupFile,$dir.$siteName.'.zip',$siteName,$backupToday,$linkBackup);
		return $repsSave;
	}
	
	public function updateBdd($siteName,$oldName,$dir)
	{
		$bdd = factory::getInstance();
		$hooks = array(
			array($siteName,PDO::PARAM_STR),
			array($oldName,PDO::PARAM_STR),
		);
		$ftp = $bdd->query("UPDATE list_site SET name=? WHERE name=?",$hooks);
		rename($dir.$oldName, $dir.$siteName);
	}
	
	public function insertBdd($site,$filen,$status,$fileLink)
	{
		$bdd = factory::getInstance();
		$hooks = array(
			array($site,PDO::PARAM_STR),
		);
		$site = $bdd->query("SELECT * FROM list_site WHERE name=?",$hooks);
		$hooks2 = array(
			array($site[0]['ftp_srv'],PDO::PARAM_INT),
		);
		$ftp = $bdd->query("SELECT * FROM srv_ftp WHERE id=?",$hooks2);
		
		
		$tempFile = "http://".$_SERVER['HTTP_HOST'].$fileLink;
		$hooks2 = array(
			array($site[0]['id'],PDO::PARAM_INT),
			array($filen,PDO::PARAM_STR),
			array($status,PDO::PARAM_STR),
			array($tempFile,PDO::PARAM_STR),
		);
		$bdd->query("INSERT INTO history_backup (id_site,date,name_file,status,link_file) VALUES (?,NOW(),?,?,?)",$hooks2);
			
	}
	public function deleteBDD($filen)
	{
		$bdd = factory::getInstance();
		$hooks = array(
			array($filen,PDO::PARAM_STR),
		);
		$bdd->query("DELETE FROM history_backup WHERE name_file=?",$hooks);			
	}

	public function checkDate($siteName)
	{	
		$nbSave = 0;
		if($siteName == "Engie")
		{
			$nbSave = 7; 
		} else { 
			$nbSave = backup::MAXSAVE;
		}
		
		$db = factory::getInstance();
		if ($handle = opendir(backup::BACKUPURL.$siteName.'/')) {
			    while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != ".." && $entry != ".htaccess" && $entry !="back.php" && $entry !="index.php") {
					$dateFile = date("F d Y H:i:s.", filectime(backup::BACKUPURL.$siteName.'/'.$entry));
					$dateTFile = new \DateTime($dateFile);
					$dateToday = new \DateTime();
					$dateTFile->modify("+$nbSave day");
					echo "<br>";
					echo $entry;
					echo "<br>";
					if($dateTFile<$dateToday)
					{
						$this->deleteBDD($entry);
						unlink(backup::BACKUPURL.$siteName.'/'.$entry);
					}
				}
			}
			closedir($handle);
		}
	}
	
	public function savefile($backupFile,$localFile,$siteName,$backupToday,$linkBackup) : bool
	{
		if(ssh2_scp_send($this->ftpId, $localFile, $backupFile))
		{		
			$this->rep[] = ['name' => $siteName, 'statut' => "Ok"];
			$this->insertBdd($siteName, $backupToday, "ok",$linkBackup);
			return true;
		}
		else
		{
			$this->rep[] = ['name' => $siteName, 'statut' => "Echec"];
			return false;
		}

	}
	public function generatePDF()
	{
		$Mypdf = new CPdf();	
		$doc = $Mypdf->genereatePDF($this->rep);
		return $doc;
	}

	public function logoutFTP()
	{
		ssh2_disconnect($this->ftpId);
	}
	
	public function checkSpaceDisk()
	{
		$diskFree = disk_free_space("/");
		$diskTotal = disk_total_space("/");
		$diskUsage = $diskTotal-$diskFree;
		
		$hooks = array(
			"disk_free" => $diskFree,
			"disk_total" => $diskTotal,
			"disk_usage" => $diskUsage,
			"percentage" =>  sprintf('%.0f',($diskUsage / $diskTotal) * 100),
		);
		return $hooks;
	}

	public function __destruct() {
		
	}
}
