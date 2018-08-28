<?php

require_once './phpClass/CMail.php';
require_once './phpClass/Cfactory.php';
require_once './phpClass/Cftp.php';
use mail\CMail;
use factory\factory;
use ftp\Cftp;

$myftp = new Cftp();
$rep = $myftp->checkSpaceDisk();
$MyEmail =new CMail();
$MyEmail->send_email_info("Attention espace disque critique : ".$rep['percentage']);
?>