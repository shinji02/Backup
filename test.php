<?php
	require_once './phpClass/Cfactory.php';
	require_once './conf/dataBase.php';
	require_once './phpClass/Cftp.php';
	require_once './phpClass/CKey.php';
	require_once './phpClass/CMail.php';
	require_once './conf/backup.php';
	require_once './phpClass/CPdf.php';

	use factory\factory;
	use PDO;
	use key\CKey;
	use mail\CMail;
	use conf\backup;
	use ftp\Cftp;
	use conf\dataBase; 
	use pdf\CPdf;
	$bdd = new factory(dataBase::DSN, dataBase::DBNAME, dataBase::USER, dataBase::PASS, dataBase::TYPE);
	$myFtp = new Cftp();
	$myKey = new CKey();
	$keySecurity = $myKey->getKey();
	$MyEmail = new CMail();
	$Mypdf = new CPdf();
	echo "Test du suppresion";
	
	$Mypdf->genereatePDF("a");