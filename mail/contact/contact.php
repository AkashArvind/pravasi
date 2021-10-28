<?php
	session_cache_limiter( 'nocache' );
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );
    $email_address = strip_tags($_POST['email']);
    $name = strip_tags($_POST['name']);
    $message = nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );		
	$result = array();
	if(empty($name)){
        $result = array( 'response' => 'error', 'empty'=>'firstname', 'message'=>'<strong>Error!</strong>&nbsp; Name is empty.' );
        echo json_encode($result );
        die;
    } 
    else if(empty( $email_address)){
        $result = array( 'response' => 'error', 'empty'=>'email', 'message'=>'<strong>Error!</strong>&nbsp; Email is empty.' );
        echo json_encode($result );
        die;
    } 
    else if (empty($message)){
         $result = array( 'response' => 'error', 'empty'=>'message', 'message'=>'<strong>Error!</strong>&nbsp; Message body is empty.' );
         echo json_encode($result );
         die;
    }
	else
	{	
		date_default_timezone_set('Asia/Kolkata');
		require('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = "infoarchikites@gmail.com";
		$mail->Password = "kites22222";
		$mail->setFrom('noreply@kshethrakalaakademi.org', 'www.kshethrakalaakademi.org/');
		$mail->addReplyTo(''.$email_address.'', ''.$name.'');
		$mail->addAddress('kshethrakalaakademi@gmail.com', 'kshethrakalaakademi');
		$mail->Subject = 'Contact Message From kshethrakalaakademi.org';
		$mail->Body =  "<h3>You have received a new message from kshethrakalaakademi.org</h3><br><b>Here are the details</b><br><br>First Name:$name<br>Email: $email_address<br><h3></h3><i>'$message'</i>"
		$mail->AltBody = 'This is a plain-text message body';
		if($mail->send())
		{
			 $result = array( 'response' => 'success', 'message'=>'<strong>Thank You!</strong>&nbsp; Your email has been delivered.' );
		}
		else
		{
			 $result = array( 'response' => 'error', 'message'=>'<strong>Error!</strong>&nbsp; Cann\'t Send Mail.'  );
		}
		echo json_encode( $result );
    die;
	}
  ?>
