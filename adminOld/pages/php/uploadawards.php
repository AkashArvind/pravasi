<?php
ob_start();
session_start();
//include("../phpfiles/include.php");
include_once('../../include/connection/functions_logphp.php');

if (login_check()) { 	
	include_once('../../include/connection/db_connectphp.php');
	$table="boarddirectorawards";
	$filename = md5(mt_rand()).'.jpg';
	$orgname=$_POST['photoname'];
	$status = (boolean) move_uploaded_file($_FILES['photo']['tmp_name'], '../../../assets/images/gallery/'.$filename); 
		//database.......................
		$query1="INSERT INTO ".$table." (`imagename`,`originalname`) VALUES ('".$filename."','".$orgname."');";
		$q1=mysql_query($query1);
		if($q1)
		{
			$id=mysql_insert_id();
		}
	
		//end of database....................
		$response = (object) [
			'status' => $status
		];
		if ($status) {
			$response->url = '../../../assets/images/gallery/'.$filename;
			$id="";
			$response->id=$id;
			$response->orgname=$orgname;
			$response->error='no';
		} 
		echo json_encode($response);				
	
}
?>