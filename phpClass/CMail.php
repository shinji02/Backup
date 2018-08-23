<?php

namespace mail;

require_once dirname(__FILE__).'/../libs/phpMailer/Exception.php';
require_once dirname(__FILE__).'/../libs/phpMailer/PHPMailer.php';
require_once dirname(__FILE__).'/../libs/phpMailer/SMTP.php';
require_once dirname(__FILE__).'/../conf/backup.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use conf\backup;

class CMail {

	public $configBackup;
	
	public function __construct() {
		$this->configBackup = new backup();
	}
	
	public function send_email_sucess($siteName)
	{
		$mail = new PHPMailer;                              // Passing `true` enables exceptions
		$mail->isSMTP();
		$mail->Host='mail.gandi.net';
		$mail->Port = 25;
		$mail->SMTPAuth = true;
		$mail->Username="mail@genesis-web.fr";
		$mail->Password="e*5d3;-d%";
		$mail->setFrom('backup@genesis-web.fr');
		foreach ($this->configBackup->LISTEMAIL as $msg)
		{
			$mail->addAddress($msg);
		}
		$mail->Subject = 'Backup du site: '.$siteName;
		$mail->msgHTML(file_get_contents( __DIR__.'/content.html'));
		$mail->AltBody = 'This is a plain-text message body';
		
		if (!$mail->send()) {
		} else {
		}
	}
	
	public function send_email_error($siteName,$message)
	{
		$mail = new PHPMailer;                              // Passing `true` enables exceptions
		$mail->isSMTP();
		$mail->Host='mail.gandi.net';
		$mail->Port = 25;
		$mail->SMTPAuth = true;
		$mail->Username="mail@genesis-web.fr";
		$mail->Password="e*5d3;-d%";
		$mail->setFrom('backup@genesis-web.fr');
		foreach ($this->configBackup->LISTEMAIL as $msg)
		{
			$mail->addAddress($msg);
		}
		$mail->Subject = 'Backup du site: '.$siteName;
		$mail->msgHTML("<html>".$message."</html>");
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		
		if (!$mail->send()) {
		} else {
		}
	}
}
