<?php
//session_start(); // Our custom secure way of starting a PHP session.
ob_start();
function checkTime($email,$password)//login check
	{
		require_once("../include/connection/functions_log.php");
      	require_once("../include/server_date.php");
      	require_once("../../config/log-config.php");
		require_once("../class/tblOp.php");
		$email; 
	    $password; // The hashed password.
	 	$check = login($email, $password);
	 	
		//echo $check;
	    if (login($email, $password)) {
	        // Login success
			//echo '<script language="javascript">';
			//echo 'alert("loged in")';
			//echo '</script>'; 
			//require_once("");
			 
	       header("Location: ../pages/index.php");
	    } 
		else 
		{
	        // Login failed 
			echo '<script language="javascript">';
			echo 'alert("failed")';
			echo '</script>'; 
	        header('Location: index.php?error=1');
	    }
    }
ob_end_clean();     
?>
 