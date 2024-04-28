<?php

/**
 * Mailer Model class
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

defined('ROOTPATH') or exit('Access Denied!');

class Mailer
{

	use Model;

	public function sendMail()
	{

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true); 
		
		// Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
		$mail->isSMTP();      

		$mail->Host       = MAIL_HOST;  
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = USERNAME; 
		$mail->Password   = PWD; 
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
		$mail->Port       = PORT;                         

		// Content
		$mail->isHTML(true);  

		return $mail;
	}
}
