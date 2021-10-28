<?php
session_start();
ob_start();
include_once('../../include/connection/functions_logphp.php');
if (login_check()) 
{
	include_once('../../include/connection/db_connectphp.php');
    include_once('../../../config/server_date.php');
	foreach($_GET as $loc=>$item)
    {
        $_GET[$loc] = urldecode(base64_decode($item));
    }
	function compress($source, $destination, $quality) 
	{
			
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg') 
		$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif') 
		$image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png') 
		$image = imagecreatefrompng($source);
		imagejpeg($image, $destination, $quality);
		return $destination;
	}
	function encode($content)
	{
		$salt ='knrmet1234567890';
		$ciphertext=trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $content, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
		return $ciphertext;
	}
		

	if (isset($_POST['testimony']))
	{
	//db code
		$content= $_POST['content'];
		$name= $_POST['name'];
	//sql code management
		$status=1;
		$table_name ='testimony';
		$query1="INSERT INTO ".$table_name." (`content`, `name`,`status`) VALUES ('".$content."', '".$name."','".$status."');";
		$q1=mysql_query($query1);
			if($q1)
			{
			
			header('Location: ../testimony.php');
			//echo "<meta http-equiv='refresh' content='0;url='>";	
			}
			else
			{
			header('Location: ../add_testimony.php?error');
			}
	//end sql
	}
	//news
	else if (isset($_POST['newnews']))
	{
	//db code
		$title = $_POST['title'];
		$description = $_POST['description'];
		$link = $_POST['link'];
		
		
		$r="";
		//var_dump($_POST);
		 $f=$_FILES["Image_up"]["name"];
		if($f!="")
		{
		$tmb_target_dir = "../../../assets/images/news/thumb/";
		$org_target_dir = "../../../assets/images/news/";
		$tmb_target_file = $tmb_target_dir.basename($_FILES["Image_up"]["name"]);
		$org_target_file = $org_target_dir.basename($_FILES["Image_up"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($org_target_file,PATHINFO_EXTENSION);
	      
			
	        $r=rand();
			$tmb_target_file = $tmb_target_dir .$r. basename($_FILES["Image_up"]["name"]);
			$org_target_file = $org_target_dir .$r. basename($_FILES["Image_up"]["name"]).'./../../assets/images/news/';    
			$f=$r.$_FILES["Image_up"]["name"];
			
	        // Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{
			header('Location: ../../error.html');
			echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";	
			} 
			else 
			{
				
				// if everything is ok, try to upload file
				$source_img =$_FILES["Image_up"]["tmp_name"];	
				$tmb_destination_img = $tmb_target_file;
				$org_destination_img = $org_target_file;	
				$d = compress($source_img, $tmb_destination_img, 20);
				$d2= compress($source_img, $org_destination_img, 70);	
				if ($d && $d2) 
				{
				$tmb_path=$tmb_target_file;	
				$org_path=$org_target_file;

					

				$status=1;
				$table_name ='news';
		    	$query1="INSERT INTO ".$table_name." (`title`, `description`,`link`, `status`,`image`) VALUES ('".$title."', '".$description."','".$link."','".$status."','".$f."');";
				$q1=mysql_query($query1);
	
				if($q1)
				{
				header('Location: ../news.php');
				}
				else
				{
				header('Location: ../add_news.php?error');
				}
				}
			  }
			}
			else
			{
				$status=1;
				$table_name ='news';
		    	$query1="INSERT INTO ".$table_name." (`title`, `description`,`link`, `status`) VALUES ('".$title."', '".$description."',
		    	'".$link."','".$status."');";
				$q1=mysql_query($query1);
	
				if($q1)
				{
				header('Location: ../news.php');
				}
				else
				{
				header('Location: ../add_news.php?error');
				}

			}


		}
			//Events.....................
		else if (isset($_POST['event']))
		{
		//db code
			$title = $_POST['title'];
			$description = $_POST['description'];
			$link = $_POST['link'];
			$place = $_POST['place'];
			$edate = $_POST['edate'];
			$datearr=array();
			
            $datearr=explode('/',$edate);
            $day=$datearr[0];
            $month=$datearr[1];
            $year=$datearr[2];
            $ndate=$year."-".$month."-".$day;




            $r="";
			//var_dump($_POST);
			 $f=$_FILES["Image_up"]["name"];
			if($f!="")
			{
			$tmb_target_dir = "../../../assets/images/events/thumb/";
			$org_target_dir = "../../../assets/images/events/";
			$tmb_target_file = $tmb_target_dir.basename($_FILES["Image_up"]["name"]);
			$org_target_file = $org_target_dir.basename($_FILES["Image_up"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($org_target_file,PATHINFO_EXTENSION);
		       
				
		        $r=rand();
				$tmb_target_file = $tmb_target_dir .$r. basename($_FILES["Image_up"]["name"]);
				$org_target_file = $org_target_dir .$r. basename($_FILES["Image_up"]["name"]);    
				$f=$r.$_FILES["Image_up"]["name"];
				
		        // Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) 
				{
				header('Location: ../../error.html');
				echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";	
				} 
				else 
				{
					
					// if everything is ok, try to upload file
					$source_img =$_FILES["Image_up"]["tmp_name"];	
					$tmb_destination_img = $tmb_target_file;
					$org_destination_img = $org_target_file;	
					$d = compress($source_img, $tmb_destination_img, 20);
					$d2= compress($source_img, $org_destination_img, 70);	
					if ($d && $d2) 
					{
					$tmb_path=$tmb_target_file;	
					$org_path=$org_target_file;

						

					$status=1;
					$table_name ='events';
			    	$query1="INSERT INTO ".$table_name." (`title`, `discription`,`link`, `image`,`place`,`date`) VALUES ('".$title."', '".$description."','".$link."','".$f."','".$place."','".$ndate."');";
					$q1=mysql_query($query1);
		
						if($q1)
						{
						    $message = "Successfully Uploaded";
					        header("Location:../event.php?msg=".urlencode(base64_encode($message)));
						}
						else
						{
						    header('Location: ../event.php');
						}
					}
				  }
				}
				else
				{
					$status=1;
					$table_name ='events';
			    	$query1="INSERT INTO ".$table_name." (`title`, `discription`,`link`, `place`,`date`) VALUES ('".$title."', '".$description."',
			    	'".$link."','".$place."','".$ndate."');";
					$q1=mysql_query($query1);
		
					if($q1)
					{
						 $message = "Successfully Uploaded";
				         header("Location:../event.php?msg=".urlencode(base64_encode($message)));
				
					}
					else
					{
					    header('Location: ../event.php');
					}

				}


		}

		//blog.....................
		elseif (isset($_POST['uploadeventphotos'])) 
		{
			$eventid=$_POST['id'];
			$filename=$_FILES['newupload']['name'];
			
			if($filename!="")
			{

				for($i=0; $i<count($_FILES['newupload']['name']); $i++) 
		        {
		        	
		           	$file_type=$_FILES['newupload']['type'][$i];
		  
			         //Make sure have a filepath
		  	        $tmpFilePath1=$_FILES["newupload"]["tmp_name"][$i];		
		  	        if ($tmpFilePath1 != "")
			        {
		              
		              	if ($file_type=="image/jpeg"||$file_type=="image/png") 
				  		{
							$rand=rand();
							//Setup our new file path
							$newFilePath1 = "../../../assets/images/events/".$rand.'_'.$_FILES['newupload']['name'][$i];
							$newFilename=$rand.'_'.$_FILES['newupload']['name'][$i];
							$source_img =$_FILES["newupload"]["tmp_name"][$i];
				          
	                        
				            	$d2 = compress($source_img, $newFilePath1,40);
				            	if($d2)
				            	{
				            		$table_name2 = 'eventphotos';
									$query2="INSERT INTO ".$table_name2." (`eventid`,`filename`) VALUES ('".$eventid."','".$newFilename."')";
									
				            	}
				            
				            
				            $q2=mysql_query($query2);

							

						}
						
						
					}
		        }
			}
			$enid=urlencode(base64_encode($eventid));
			if($q2)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../manageeventphotos.php?event=".$enid."&msg=".urlencode(base64_encode($message)));
			
					
				
							
	            
			}
			else
			{

			  	header('Location: ../manageeventphotos.php?event='.$enid);
			  	
			}
		}
	 
			//blog.....................
		else if (isset($_POST['blog']))
		{
		//db code
			$title = $_POST['title'];
			$description = $_POST['description'];
			$videolink = $_POST['videolink'];
			$videotitle=$_POST['videotitle'];
			$author = $_POST['author'];
			$date = $_POST['edate'];
			$datearr=array();
			
            $datearr=explode('/',$date);
            $day=$datearr[0];
            $month=$datearr[1];
            $year=$datearr[2];
            $ndate=$year."-".$month."-".$day;

			$image1title=$_POST['image1title'];
			$image1description=$_POST['image1description'];
			$image2title=$_POST['image2title'];
			$image2description=$_POST['image2description'];
			$statusvalue=$_POST['statusvalue'];
			
			$table_name ='blog';
	    	$query1="INSERT INTO `blog`(`title`, `author`, `date`, `image1desc`,  `videolink`, `videotitle`, `image2desc`, `status`,`image1title`,	image2title) VALUES ('".$title."', '".$author."','".$ndate."','".$image1description."','".$videolink."','".$videotitle."','".$image2description."','".$statusvalue."','".$image1title."','".$image2title."');";
			$q1=mysql_query($query1);

			if($q1)
			{
				$id=mysql_insert_id();
				$sqlquery2="insert into  `blogcontent` (blog_id,content) values('".$id."','".$description."')";
				$query2=mysql_query($sqlquery2);
				
				//image1.....................................................
			 	$f=$_FILES["Image"]["name"];
				if($f!="")
				{
					$r="";
					$tmb_target_dir = "../../../assets/images/blog/thumb/";
					$org_target_dir = "../../../assets/images/blog/";
					$tmb_target_file = $tmb_target_dir.basename($_FILES["Image"]["name"]);
					$org_target_file = $org_target_dir.basename($_FILES["Image"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($org_target_file,PATHINFO_EXTENSION);				
			        $r=rand();
					$tmb_target_file = $tmb_target_dir .$r. basename($_FILES["Image"]["name"]);
					$org_target_file = $org_target_dir .$r. basename($_FILES["Image"]["name"]);    
					$f=$r.$_FILES["Image"]["name"];
					
			        // Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) 
					{
						header('Location: ../../error.html');
						echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";	
					} 
					else 
					{
					
						// if everything is ok, try to upload file
						$source_img =$_FILES["Image"]["tmp_name"];	
						$tmb_destination_img = $tmb_target_file;
						$org_destination_img = $org_target_file;	
						$d = compress($source_img, $tmb_destination_img, 20);
						$d2= compress($source_img, $org_destination_img, 70);	
						if ($d && $d2) 
						{
							$tmb_path=$tmb_target_file;	
							$org_path=$org_target_file;
							$status=1;
							$table_name ='blog';
					    	$query1="update `blog` SET `image1`='".$f."' where id='".$id."'";
							$q1=mysql_query($query1);
				
							if($q1)
							{
							//success
							}
							else
							{
									header('Location: ../../error.html');
									echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";	
							}
						}
				  }
				}
				//image2.....................................................
			 	$f2=$_FILES["Image2"]["name"];
				if($f2!="")
				{   $r="";
					$tmb_target_dir = "../../../assets/images/blog/thumb/";
					$org_target_dir = "../../../assets/images/blog/";
					$tmb_target_file = $tmb_target_dir.basename($_FILES["Image2"]["name"]);
					$org_target_file = $org_target_dir.basename($_FILES["Image2"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($org_target_file,PATHINFO_EXTENSION);				
			        $r=rand();
					$tmb_target_file = $tmb_target_dir .$r. basename($_FILES["Image2"]["name"]);
					$org_target_file = $org_target_dir .$r. basename($_FILES["Image2"]["name"]);    
					$f2=$r.$_FILES["Image2"]["name"];
					
			        // Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) 
					{
						header('Location: ../../error.html');
						echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";	
					} 
					else 
					{
					
						// if everything is ok, try to upload file
						$source_img =$_FILES["Image2"]["tmp_name"];	
						$tmb_destination_img = $tmb_target_file;
						$org_destination_img = $org_target_file;	
						$d = compress($source_img, $tmb_destination_img, 20);
						$d2= compress($source_img, $org_destination_img, 70);	
						if ($d && $d2) 
						{
							$tmb_path=$tmb_target_file;	
							$org_path=$org_target_file;
							$status=1;
							$table_name ='blog';
					    	$query1="update `blog` SET `image2`='".$f2."' where id='".$id."'";
							$q1=mysql_query($query1);
				
							if($q1)
							{
							//success
							}
							else
							{
							header('Location: ../../error.html');
						echo "<meta http-equiv='refresh' content='0;url=../../error.html'>";	
							}
						}
				  }
				}

			header('Location: ../blog.php');

			}
			else
			{
			header('Location: ../add_blog.php?error');
			}


		}
		//......................addBoardofdirector
		elseif (isset($_POST['addboardofdirector'])) 
		{
			$name=$_POST['name'];
			$position=$_POST['position'];
			$qualification=$_POST['qualification'];
			$workexperience=$_POST['workexperience'];
			$table_name="boardofdirectors";
			$photo=$_FILES["photo"]["name"];
			if($photo!="")
			{
				$photo_type=$_FILES['photo']['type'];
	        	if($photo_type=="image/jpeg" || $photo_type=="image/png") 
				{
					$randf=rand();
					$target_dir="../../../assets/images/boarddirectors/";				
			        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
	                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
	                $tempfile=$_FILES["photo"]["tmp_name"];
					$d1 = compress($tempfile,$target_file,40);
					if($d1)
					{
						 $query1 = "INSERT INTO $table_name (`name`, `position`, `workexperience`, `qualification`, `image`,`date`,`time`) VALUES ('".$name."', '".$position."', '".$workexperience."','".$qualification."', '".$newtargetfile."','".$server_date."','".$server_time."')";
						$q1=mysql_query($query1);
		                $directorid=mysql_insert_id();
		                for($i=0; $i<count($_FILES['award']['name']); $i++) 
					    {
						//Get the temp file path
						   $flag="";
						   $file_type=$_FILES['award']['type'][$i];
							//Make sure have a filepath
						  	$tmpFilePath1=$_FILES["award"]["tmp_name"][$i];
							if($tmpFilePath1 != "")
							{
								if($file_type=="image/jpeg" || $file_type=="application/pdf" || $file_type=="image/png") 
						  		{
									$rand=rand();
									//Setup our new file path
									$newFilePath1 = "../../../assets/images/boarddirectorawards/".$rand.'_'.$_FILES['award']['name'][$i];
									$newFilename=$rand.'_'.$_FILES['award']['name'][$i];
									$source_img =$_FILES["award"]["tmp_name"][$i];
									if($file_type=="image/jpeg" || $file_type=="image/png")
						            {
						            	$d2 = compress($source_img,$newFilePath1,40);
						            	if($d2)
						            	{
						            		$table_name2 = 'boarddirectorawards';
											$query2="INSERT INTO ".$table_name2." (`directorid`,`filename`,`date`,`time`) VALUES ('".$directorid."','".$newFilename."','".$server_date."','".$server_time."')";	
						            	}
						            }
						            else
						            {
						            	if(move_uploaded_file($tmpFilePath1, $newFilePath1)) 
										{
											$table_name2 = 'boarddirectorawards';
											$query2="INSERT INTO ".$table_name2." (`directorid`,`filename`,`date`,`time`) VALUES ('".$directorid."','".$newFilename."','".$server_date."','".$server_time."')";
										}
						            } 
						            
						            $q2=mysql_query($query2);
									
									
								}
								
							}	
					    }
					}


				}
				

			}
			if($q1)
			{
				$message = "Successfully added";
				header("Location:../boardofdirectors.php?msg=".urlencode(base64_encode($message)));

				
			}
			else
			{
				header("Location:../boardofdirectors.php");
				
				
				
			}
			       
			
		    
		}

		//......................uploadawards
		elseif (isset($_POST['uploadawards'])) 
		{
			$directorid=$_POST['id'];
			$filename=$_FILES['newupload']['name'];
			$uploadError="";
			if($filename!="")
			{

				for($i=0; $i<count($_FILES['newupload']['name']); $i++) 
		        {
		        	
		           	$file_type=$_FILES['newupload']['type'][$i];
		  
			         //Make sure have a filepath
		  	        $tmpFilePath1=$_FILES["newupload"]["tmp_name"][$i];		
		  	        if ($tmpFilePath1 != "")
			        {
		              
		              	if ($file_type=="image/jpeg"||$file_type=="application/pdf" || $file_type=="image/png") 
				  		{
							$rand=rand();
							//Setup our new file path
							$newFilePath1 = "../../../assets/images/boarddirectorawards/".$rand.'_'.$_FILES['newupload']['name'][$i];
							$newFilename=$rand.'_'.$_FILES['newupload']['name'][$i];
							$source_img =$_FILES["newupload"]["tmp_name"][$i];
				          
	                        if($file_type=="image/jpeg" || $file_type=="image/png")
				            {
				            	$d2 = compress($source_img, $newFilePath1,40);
				            	if($d2)
				            	{
				            		$table_name2 = 'boarddirectorawards';
									$query2="INSERT INTO ".$table_name2." (`directorid`,`filename`,`date`,`time`) VALUES ('".$directorid."','".$newFilename."','".$server_date."','".$server_time."')";
									
				            	}
				            }
				            else
				            {
				            	if(move_uploaded_file($tmpFilePath1, $newFilePath1)) 
								{
									$table_name2 = 'boarddirectorawards';
									$query2="INSERT INTO ".$table_name2." (`directorid`,`filename`,`date`,`time`) VALUES ('".$directorid."','".$newFilename."','".$server_date."','".$server_time."')";
									
									
								}
				            } 
				            $q2=mysql_query($query2);

							

						}
						else
						{
							
						  	/*$fname=$_FILES['newupload']['name'][$i];
						  	$result[]="File : ".$fname." is not uploaded. only jpeg/jpg/pdf  files allowed!";*/
						  	$uploadError="error";
						}
						
					}
		        }
			}
			$enid=urlencode(base64_encode($directorid));
			if($q2)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../manageawards.php?board=".$enid."&msg=".urlencode(base64_encode($message)));
			
					
				
							
	            
			}
			else
			{

			  	header('Location: ../manageawards.php?board='.$enid);
			  	
			}
		}
		//............addartist
		elseif (isset($_POST['addartist'])) 
		{
			$name=$_POST['name'];
			$profiledescription = $_POST['profiledescription'];
			$qualification=$_POST['qualification'];
			$workexperience=$_POST['workexperience'];
			$table_name="artists";
			$photo=$_FILES["photo"]["name"];
			$fbid=$_POST['fbid'];
			$webid=$_POST['webid'];
			if($photo!="")
			{
				$photo_type=$_FILES['photo']['type'];
	        	if($photo_type=="image/jpeg" || $photo_type=="image/png") 
				{
					$randf=rand();
					$target_dir="../../../assets/images/artists/";				
			        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
	                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
	                $tempfile=$_FILES["photo"]["tmp_name"];
					$d1 = compress($tempfile,$target_file,40);
					if($d1)
					{
						 $query1 = "INSERT INTO $table_name (`name`,`workexperience`, `qualification`,`profiledescription`, `image`,`date`,`time`,`facebookid`,`websiteid`) VALUES ('".$name."','".$workexperience."','".$qualification."','".$profiledescription."', '".$newtargetfile."','".$server_date."','".$server_time."','".$fbid."','".$webid."')";
						$q1=mysql_query($query1);
		                $artistid=mysql_insert_id();
		                for($i=0; $i<count($_FILES['certificate']['name']); $i++) 
					    {
						//Get the temp file path
						   $flag="";
						   $file_type=$_FILES['certificate']['type'][$i];
							//Make sure have a filepath
						  	$tmpFilePath1=$_FILES["certificate"]["tmp_name"][$i];
							if($tmpFilePath1 != "")
							{
								if($file_type=="image/jpeg" || $file_type=="application/pdf" || $file_type=="image/png") 
						  		{
									$rand=rand();
									//Setup our new file path
									$newFilePath1 = "../../../assets/images/artistcertificates/".$rand.'_'.$_FILES['certificate']['name'][$i];
									$newFilename=$rand.'_'.$_FILES['certificate']['name'][$i];
									$source_img =$_FILES["certificate"]["tmp_name"][$i];
									if($file_type=="image/jpeg" || $file_type=="image/png")
						            {
						            	$d2 = compress($source_img,$newFilePath1,40);
						            	if($d2)
						            	{
						            		$table_name2 = 'artistcertificates';
											$query2="INSERT INTO ".$table_name2." (`artistid`,`filename`,`date`,`time`) VALUES ('".$artistid."','".$newFilename."','".$server_date."','".$server_time."')";	
						            	}
						            }
						            else
						            {
						            	if(move_uploaded_file($tmpFilePath1, $newFilePath1)) 
										{
											$table_name2 = 'artistcertificates';
											$query2="INSERT INTO ".$table_name2." (`artistid`,`filename`,`date`,`time`) VALUES ('".$artistid."','".$newFilename."','".$server_date."','".$server_time."')";
										}
						            } 
						            
						            $q2=mysql_query($query2);
									
									
								}
								
							}	
					    }
					}


				}
				

			}
			if($q1)
			{
				$message = "Successfully added";
				header("Location:../artistprofiles.php?msg=".urlencode(base64_encode($message)));

				
			}
			else
			{
				header("Location:../artistprofiles.php");
				
				
				
			}
		}

		elseif (isset($_POST['uploadcertificates'])) 
		{
			$artistid=$_POST['id'];
			$filename=$_FILES['newupload']['name'];
			$uploadError="";
			if($filename!="")
			{

				for($i=0; $i<count($_FILES['newupload']['name']); $i++) 
		        {
		        	
		           	$file_type=$_FILES['newupload']['type'][$i];
		  
			         //Make sure have a filepath
		  	        $tmpFilePath1=$_FILES["newupload"]["tmp_name"][$i];		
		  	        if ($tmpFilePath1 != "")
			        {
		              
		              	if ($file_type=="image/jpeg"||$file_type=="application/pdf" || $file_type=="image/png") 
				  		{
							$rand=rand();
							//Setup our new file path
							$newFilePath1 = "../../../assets/images/artistcertificates/".$rand.'_'.$_FILES['newupload']['name'][$i];
							$newFilename=$rand.'_'.$_FILES['newupload']['name'][$i];
							$source_img =$_FILES["newupload"]["tmp_name"][$i];
				          
	                        if($file_type=="image/jpeg" || $file_type=="image/png")
				            {
				            	$d2 = compress($source_img, $newFilePath1,40);
				            	if($d2)
				            	{
				            		$table_name2 = 'artistcertificates';
									$query2="INSERT INTO ".$table_name2." (`artistid`,`filename`,`date`,`time`) VALUES ('".$artistid."','".$newFilename."','".$server_date."','".$server_time."')";
									
				            	}
				            }
				            else
				            {
				            	if(move_uploaded_file($tmpFilePath1, $newFilePath1)) 
								{
									$table_name2 = 'artistcertificates';
									$query2="INSERT INTO ".$table_name2." (`artistid`,`filename`,`date`,`time`) VALUES ('".$artistid."','".$newFilename."','".$server_date."','".$server_time."')";
									
									
								}
				            } 
				            $q2=mysql_query($query2);

							

						}
						else
						{
							
						  	/*$fname=$_FILES['newupload']['name'][$i];
						  	$result[]="File : ".$fname." is not uploaded. only jpeg/jpg/pdf  files allowed!";*/
						  	$uploadError="error";
						}
						
					}
		        }
			}
			$enid=urlencode(base64_encode($artistid));
			if($q2)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../managecertificates.php?artist=".$enid."&msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../managecertificates.php?artist='.$enid);
			  	
			}
		}

		elseif (isset($_POST['addcourse'])) 
		{
			$name=$_POST['name'];
			$subheading=$_POST['subheading'];
			$description=$_POST['description'];

            $photo=$_FILES["photo"]["name"];
            $type=$_POST['category'];
			if($photo!="")
			{
				    //$photo_type=$_FILES['photo']['type'];
	        	
					$table_name="courses";
					$randf=rand();
					$target_dir="../../../assets/images/courses/";				
			        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
	                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
	                $tempfile=$_FILES["photo"]["tmp_name"];
					
					if(move_uploaded_file($tempfile,$target_file)) 
					{
						
					echo	$query1="INSERT INTO ".$table_name."(`name`,`subheading`,`type`,`description`,`image`,`date`,`time`) VALUES ('".$name."','".$subheading."','".$type."','".$description."','".$newtargetfile."','".$server_date."','".$server_time."')";
						
						
					}
					
					$q1=mysql_query($query1);

				
			}
			if($q1)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../courses.php?msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../courses.php');
			  	
			}
				
		}
		elseif (isset($_POST['addebrochure'])) 
		{
			$title=$_POST['title'];
		  
            $photo=$_FILES["photo"]["name"];
			if($photo!="")
			{
				$photo_type=$_FILES['photo']['type'];
				  $table_name=" ebrochures";
	        	if($photo_type=="image/jpeg" || $photo_type=="image/png" || $photo_type=="application/pdf") 
				{
					    $randf=rand();
						$target_dir="../../../assets/images/ebrochure/";				
				        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		                $tempfile=$_FILES["photo"]["tmp_name"];
					
					if($photo_type=="image/jpeg" || $photo_type=="image/png") 
					{
						
						$d1 = compress($tempfile,$target_file,40);
						if($d1)
						{
							 $query1 = "INSERT INTO ".$table_name." (`title`,`filename`,`date`,`time`) VALUES ('".$title."','".$newtargetfile."','".$server_date."','".$server_time."')";
						}
					}
					else
					{
						if(move_uploaded_file($tempfile,$target_file)) 
						{
							
							$query1="INSERT INTO ".$table_name." (`title`,`filename`,`date`,`time`) VALUES ('".$title."','".$newtargetfile."','".$server_date."','".$server_time."')";
							
							
						}
					}
					$q1=mysql_query($query1);

				}
			}
			if($q1)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../ebrochures.php?msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../ebrochures.php');
			  	
			}
		}
		elseif (isset($_POST['addapplicationform'])) 
		{
            $title=$_POST['title'];
		  
            $photo=$_FILES["photo"]["name"];
			if($photo!="")
			{
				$photo_type=$_FILES['photo']['type'];
				  $table_name=" applicationforms";
	        	if($photo_type=="image/jpeg" || $photo_type=="image/png" || $photo_type=="application/pdf") 
				{
					    $randf=rand();
						$target_dir="../../../assets/images/applicationforms/";				
				        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		                $tempfile=$_FILES["photo"]["tmp_name"];
					
					if($photo_type=="image/jpeg" || $photo_type=="image/png") 
					{
						
						$d1 = compress($tempfile,$target_file,40);
						if($d1)
						{
							 $query1 = "INSERT INTO ".$table_name." (`title`,`filename`,`date`,`time`) VALUES ('".$title."','".$newtargetfile."','".$server_date."','".$server_time."')";
						}
					}
					else
					{
						if(move_uploaded_file($tempfile,$target_file)) 
						{
							
							$query1="INSERT INTO ".$table_name." (`title`,`filename`,`date`,`time`) VALUES ('".$title."','".$newtargetfile."','".$server_date."','".$server_time."')";
							
							
						}
					}
					$q1=mysql_query($query1);

				}
			}
			if($q1)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../applicationforms.php?msg=".urlencode(base64_encode($message)));				
	            
			}
			else
			{

			  	header('Location: ../applicationforms.php');
			  	
			}
			
		}
		elseif (isset($_POST['addtimeline'])) 
		{
		    $title=$_POST['title'];
		  
            $description=$_POST['description'];
            $date=$_POST['form_datetime'];
          
            $datearr=array();
			
            $datearr=explode('/',$date);
            $day=$datearr[0];
            $month=$datearr[1];
            $year=$datearr[2];
			$table_nam="activities";

							
			 $query1="INSERT INTO ".$table_nam."(`title`,`description`,`day`,`month`,`year`) VALUES ('".$title."','".$description."','".$day."','".$month."','".$year."')";
			$q1=mysql_query($query1);

				
			
			if($q1)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../timeline.php?msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../timeline.php');
			  	
			}


		}
				
		
		elseif (isset($_POST['uploadgallery'])) 
		{
			 $id=$_POST['id'];
			 $photo=$_FILES["newupload"]["name"];
			 $name=$_POST['name'];
			 $category=$_POST['category'];
			 $enid=urlencode(base64_encode($id));
			
                $dir="../../../assets/images/gallery/";
                
                
				for($i=0; $i<count($_FILES['newupload']['name']); $i++) 
		        {
		        	
		           	//$file_type=$_FILES['newupload']['type'][$i];
		  
			         //Make sure have a filepath
		  	        $tmpFilePath1=$_FILES["newupload"]["tmp_name"][$i];		
		  	        if ($tmpFilePath1 != "")
			        {
		              
		              	
							$rand=rand();
							//Setup our new file path

							
							$newFilePath1 = $dir.$rand.'_'.$_FILES['newupload']['name'][$i];
							$newFilename=$rand.'_'.$_FILES['newupload']['name'][$i];
							$source_img =$_FILES["newupload"]["tmp_name"][$i];
				          
	                       
				            	$d1= compress($source_img, $newFilePath1,40);
				            	if($d1)
				            	{
				            		$table_name2 = 'gallery';
									$query1="INSERT INTO ".$table_name2." (`subcategoryid`,`imagename`,`date`,`time`) VALUES ('".$id."','".$newFilename."','".$server_date."','".$server_time."')";
									
				            	}
				            
				            
				            $q1=mysql_query($query1);

							

						
						
						
					}
		        }
			
			if($q1)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../uploadgallery.php?id=".$enid."&msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../upload_gallery.php?id='.$enid);
			  	
			}
		}
		elseif (isset($_POST['addgallerycategory'])) 
		{
			    // $category = str_replace(' ', '', $_POST['category']);
			
			    // $type=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($category))));  
                $type= $_POST['category'];
				
        		$table_name = 'gallerycategory';
                $query1="SELECT category FROM ".$table_name." WHERE category='$type'";
                $q1=mysql_query($query1);
                if(mysql_num_rows($q1)==0)
                {
                	 $query2="INSERT INTO ".$table_name." (`category`) VALUES ('".$type."')";
			         $q2=mysql_query($query2);	
                }

					
			
			if($q2)
			{    
				 $message = "Successfully Added";
				 header("Location:../gallery.php?msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../gallery.php');
			  
			}	
		}
		elseif (isset($_POST['addgallerysubcategory'])) 
		{
			  

			  $categoryid=$_POST['categoryid'];
			  $description=$_POST['description'];
			  $name=$_POST['name'];
			 
			  $coverimage=$_FILES["coverimage"]["name"];
            
				if($coverimage!="")
				{
					    //$photo_type=$_FILES['photo']['type'];
		        	
						$table_name2 = 'gallerysubcategory';
						$randf=rand();
						$target_dir="../../../assets/images/gallery/";				
				        $target_file= $target_dir .$randf.'_'. basename($_FILES["coverimage"]["name"]);
		                $newtargetfile=$randf.'_'. basename($_FILES["coverimage"]["name"]);
		                $tempfile=$_FILES["coverimage"]["tmp_name"];
						$d1 = compress($tempfile,$target_file,40);
						if($d1)
						{
							
							$query1="INSERT INTO ".$table_name2." (`categoryid`,`name`,`description`,`coverimage`) VALUES ('".$categoryid."','".$name."','".$description."','".$newtargetfile."')";
							
							
						}
						
						$q1=mysql_query($query1);

					
				}
			 
			    
				
        				
			if($q1)
			{    
				 $message = "Successfully Added";
				 header("Location:../managegallery.php?id=".urlencode(base64_encode($categoryid))."&msg=".urlencode(base64_encode($message)));
				
	            
			}
			else
			{

			  	header('Location: ../managegallery.php?id='.urlencode(base64_encode($categoryid)));
			  
			}
		}	
		elseif (isset($_POST['uploadartistimages'])) 
		{
			$artistid=$_POST['id'];
			$filename=$_FILES['newupload']['name'];
			
			if($filename!="")
			{

				for($i=0; $i<count($_FILES['newupload']['name']); $i++) 
		        {
		        	
		           	$file_type=$_FILES['newupload']['type'][$i];
		  
			         //Make sure have a filepath
		  	        $tmpFilePath1=$_FILES["newupload"]["tmp_name"][$i];		
		  	        if ($tmpFilePath1 != "")
			        {
		              
		              	if ($file_type=="image/jpeg"||$file_type=="image/png") 
				  		{
							$rand=rand();
							//Setup our new file path
							$newFilePath1 = "../../../assets/images/artists/".$rand.'_'.$_FILES['newupload']['name'][$i];
							$newFilename=$rand.'_'.$_FILES['newupload']['name'][$i];
							$source_img =$_FILES["newupload"]["tmp_name"][$i];
				          
	                        
				            	$d2 = compress($source_img, $newFilePath1,40);
				            	if($d2)
				            	{
				            		$table_name2 = 'artistimages';
									$query2="INSERT INTO ".$table_name2." (`artistid`,`imagename`) VALUES ('".$artistid."','".$newFilename."')";
									
				            	}
				            
				            
				            $q2=mysql_query($query2);

							

						}
						
						
					}
		        }
			}
			$enid=urlencode(base64_encode($artistid));
			if($q2)
			{    
				 $message = "Successfully Uploaded";
				 header("Location:../uploadaritistmoreimages.php?artist=".$enid."&msg=".urlencode(base64_encode($message)));
			
					
				
							
	            
			}
			else
			{

			  	header('Location: ../uploadaritistmoreimages.php?artist='.$enid);
			  	
			}
		}
		
			


}
else 
{
}
?>