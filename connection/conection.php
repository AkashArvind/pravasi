<?php
if (!isset($_SESSION['sit_visitr_web_']) || $_SESSION['sit_visitr_web_'] != $_SERVER['HTTP_USER_AGENT']) 
{
	die();
} 
else 
{
	// processing code here //
	$db=mysqli_connect("localhost","root","");
	mysqli_select_db($db,"kshethrakala");
}
?>