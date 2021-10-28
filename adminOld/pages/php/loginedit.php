<?php
session_start();
ob_start();
include_once('../../include/connection/functions_logphp.php');
if (login_check()) 
{
if (isset($_POST['login'])) 
{
	
	include_once('../../include/connection/db_connectphp.php');
	foreach($_GET as $loc=>$item)
    {
        $_GET[$loc] = urldecode(base64_decode($item));
    }				
	$loginid= $_SESSION['userclient_id'];
	$password= $_POST['newpassword'];
	$salt ='photos1234567890'; 
	$oldp= $_POST['oldpassword'];
	$retypepassword= $_POST['retypepassword'];
	
	if($password!=$retypepassword)
	{
	$message = "Retype password missmatch";

	}
	else
	{
 	$table_name ='log_admin';  
 	$result="SELECT * FROM $table_name WHERE user_id= $loginid";
	$q1=mysql_query($result);
	$pass="";
	if ($r = mysql_fetch_array($q1)) 
	{
	$pass=$r['pass_d'];
	}
	$oldp=trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt,$oldp, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));

	if($pass==$oldp)
	{ 
		$password=trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt,$password, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	$query1 = "UPDATE `".$table_name."` SET `pass_d` = '".$password."' WHERE `user_id` = ".$loginid."";
	$q1=mysql_query($query1);
	header('Location:../log/logout.php');
	die();
	}
	else
	{
		//header('Location: ../profile.php');
			$message = "Old password is incorrect";
		//echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";
	}
	}
	header("Location:../profile.php?msg=".urlencode(base64_encode($message)));

	
}
		
}
else 
{
}
?>