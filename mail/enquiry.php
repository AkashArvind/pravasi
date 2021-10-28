<?php
session_start();
$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];
ob_start();
if(isset($_POST['enquiry']))
{
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	date_default_timezone_set('Asia/Qatar');
	require('phpmailer/PHPMailerAutoload.php');
	$mail = new PHPMailer;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->Username = "infoarchikites@gmail.com";
	$mail->Password = "kites22222";
	$mail->setFrom('noreply@kshethrakalaacademy.org', 'kshethrakalaacademy');
	$mail->addReplyTo(''.$email_address.'', ''.$name.'');
	$mail->addAddress('vvpranav04@gmail.com', 'vvpranav04');
	$mail->Subject = 'New mail from www.skyvisionadv.com';
	
	$mail->Body =  "<h3>You have received a new mail from your website</h3><br><b>Here are the details</b><br><br>
		Name: $name<br>
		Address: $address<br>
		Phone: $phone<br>
		Email: $email<br>";
	$mail->AltBody = 'This is a plain-text message body';
	if($mail->send())
	{
		header("Location:../index.php?success");
	}
	else
	{
		header("Location:../index.php?failed");
	}
}
?>
