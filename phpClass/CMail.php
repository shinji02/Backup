<?php

namespace mail;

require_once dirname(__FILE__).'/../libs/phpMailer/Exception.php';
require_once dirname(__FILE__).'/../libs/phpMailer/PHPMailer.php';
require_once dirname(__FILE__).'/../libs/phpMailer/SMTP.php';
require_once dirname(__FILE__).'/../conf/backup.php';
require_once dirname(__FILE__).'/../conf/dataBase.php';
require_once dirname(__FILE__).'/Cfactory.php';
require_once dirname(__FILE__).'/../conf/MessageConf.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use conf\backup;
use factory\factory;
use conf\MessageConf;

class CMail {

	public $configBackup;
	
	public function __construct() {
		$this->configBackup = new backup();
	}
	
	public function send_email_sucess($doc)
	{
		$bdd = factory::getInstance();
		$query = $bdd->query("SELECT * FROM `options` WHERE id_options = 1");
		if($query[0]['send_email_success'] == 1)
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
			$mail->Subject = MessageConf::$TITLE_BACKUP_ALL;
			$mail->msgHTML("<html>".MessageConf::$TITLE_BACKUP_ALL."</html>");
			$mail->AltBody = 'This is a plain-text message body';
			$mail->addStringAttachment($doc, "rapport.pdf","base64","application/pdf");
			if (!$mail->send()) {
			} else {
			}	
		}		
	}
	
	public function send_email_error($siteName,$message)
	{
		$bdd = factory::getInstance();
		$query = $bdd->query("SELECT * FROM `options` WHERE id_options = 1");
		if($query[0]['send_email_error'] == 1)
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
			$mail->Subject = str_replace("{sitename}", $siteName, MessageConf::$TITLE_BACKUP_ECHEC);
			$mail->msgHTML("<html>".str_replace("{sitename}",$siteName,MessageConf::$MESSAGE_BACKUP_ECHE)."</html>");
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file

			if (!$mail->send()) {
			} else {
			}
		}
	}
	
		public static function send_email_info($title,$message)
	{
		$bdd = factory::getInstance();
		$query = $bdd->query("SELECT * FROM `options` WHERE id_options = 1");
		if($query[0]['send_email_info'] == 1)
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
			$mail->Subject = $title;
			$mail->msgHTML("<html>".$message."</html>");
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file

			if (!$mail->send()) {
			} else {
			}
		}
	}
}
