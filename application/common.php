<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function send_email($targetEmail,$username)
{
	//SMTP needs accurate times, and the PHP time zone MUST be set
	//This should be done in your php.ini, but this is how to do it if you don't have access to that
	date_default_timezone_set('Etc/UTC');
	
	require '../vendor/phpmailer/PHPMailerAutoload.php';
	
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = "smtp.163.com";
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "13146794571@163.com";
	//Password to use for SMTP authentication
	$mail->Password = "Baker95930";
	//Set who the message is to be sent from
	$mail->setFrom('13146794571@163.com', 'First Last');
	//Set an alternative reply-to address
	$mail->addReplyTo('13146794571@163.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress($targetEmail, $username);
	//$mail->addAddress('whoto@example.com', 'John Doe');
	//Set the subject line
	$mail->Subject = 'PHPMailer SMTP test';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML("<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
  							<h1>hi,".$username.",welcome visit http://www.mrp.com .</h1>
						</div>", dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	$mail->addAttachment('images/phpmailer_mini.png');
	
	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
	
}