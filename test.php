<?php

require_once './phpClass/CMail.php';
require_once './phpClass/Cfactory.php';
require_once './phpClass/Cftp.php';
require_once './phpClass/CKey.php';
use mail\CMail;
use factory\factory;
use ftp\Cftp;
use key\CKey;

$myftp = new Cftp();
$rep = $myftp->checkSpaceDisk();
$MyEmail =new CMail();

	$myKey = new CKey();
	$keySecurity = $myKey->getKey();

			$active1=1;
			$chName = curl_init();
			$postDataName = array(
					'sFormValidator' => $keySecurity,
					'checkSiteName' => $active1
				);

			curl_setopt($chName , CURLOPT_URL,"http://localhost/genesis/backup/back.php");
			curl_setopt($chName , CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($chName , CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($chName , CURLOPT_TIMEOUT, 5);
			//curl_setopt($chName , CURLOPT_DNS_USE_GLOBAL_CACHE, false);
			curl_setopt($chName , CURLOPT_DNS_CACHE_TIMEOUT, 1);
			curl_setopt($chName , CURLOPT_POST, true);
			curl_setopt($chName , CURLOPT_TIMEOUT,0);
			curl_setopt($chName , CURLOPT_POSTFIELDS, $postDataName);
			curl_setopt($chName , CURLOPT_RETURNTRANSFER, true);

			$dataName = curl_exec($chName);
			$httpcodeName = curl_getinfo($chName , CURLINFO_HTTP_CODE);
			curl_close($chName);
			echo ($dataName);
			
?>