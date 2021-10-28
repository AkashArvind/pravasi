<?php
ob_start();
session_start();
//include("../phpfiles/include.php");

require_once("include/connection/functions_log.php");
if (login_check()) 
{ 
  header("Location:pages/index.php");
}
else{
	header("Location:adminLog/index.php");
}