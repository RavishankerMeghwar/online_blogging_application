<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'PHPMailer/src/Exception.php';

    class send_mail_class
   {
     	function send_to_admin_regis($email,$sub,$message)
	   {
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->SMTPAuth = true;
			$mail->Username = 'csravi816@gmail.com';
			$mail->Password = 'tgrfkfghtwlfluic';
			$mail->setFrom('csravi816@gmail.com','Online Blogging Application');
			$mail->addAddress($email);
			$mail->Subject = $sub;
			$mail->msgHTML($message);
			
			if (!$mail->send()) {
	            return false;
			} else {
				return true;
			}
       }
   }

 ?>