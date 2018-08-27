<?php

require_once './phpClass/CMail.php';

use mail\CMail;


$mail = new CMail();

$mail->send_email_sucess("a");
?>