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

		$mail->Host       = '';  // eg smtp.gmail.com                   
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = ''; // email sending from                    
		$mail->Password   = ''; // this email password                              
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
		$mail->Port       = 587;  // else 465                                 

		// Content
		$mail->isHTML(true);  

		return $mail;
	}
}
