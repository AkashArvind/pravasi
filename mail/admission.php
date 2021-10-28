<?php
session_start();
$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];
ob_start();
if(isset($_POST['sendmail']))
{
	$aplicantname = $_POST['applicantname'];
	$gender = $_POST['gender'];
	$course = $_POST['course'];
	$gname = $_POST['gname'];
	$relationship = $_POST['relationship'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$class = $_POST['class'];
	$address = $_POST['address'];

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
	$mail->addAddress('kshethrakalaakademi@gmail.com', 'vvpranav04');
	$mail->Subject = 'New mail from www.skyvisionadv.com';
	
	$mail->Body =  "<h3>You have received a new mail from your website</h3><br><b>Here are the details</b><br><br>
		Applicant name: $aplicantname<br>
		Gender: $gender<br>
		Preferred course: $course<br>
		Parent/Guardian name: $aplicantname<br>
		Relationship with applicant: $relationship<br>
		Phone number: $phone<br>
		Date of birth: $dob<br>
		School name and class: $class<br>
		Address: $address<br>";
	$mail->AltBody = 'This is a plain-text message body';
	if($mail->send())
	{
		header("Location:../admission.php?success");
	}
	else
	{
		header("Location:../admission.php?failed");
	}
}
?>
