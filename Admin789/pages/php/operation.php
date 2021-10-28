<?php
session_start();
ob_start();
include_once('../../include/connection/functions_logphp.php');
if (login_check()) 
{ 
	include_once('../../include/connection/db_connectphp.php');

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
	
	if(isset($_POST['testimony'])){
		 $id=$_POST['testimony'];
		 $name=$_POST['name'];
		 $content=$_POST['content'];
		 $table_name="testimony";
		$query1 = "UPDATE `".$table_name."` SET `content` = '$content' ,`name` = '$name' WHERE `id` = ".$id.";";
		$q1=mysql_query($query1);
		if($q1)
			{
				header("Location:../testimony.php?succ");
			}
			else{
				header("Location:../testimony.php?error");
			}
		

	}
	 if (isset($_POST['news']))
		{
			
			$title= $_POST['title'];
			$description= $_POST['description'];
			$link= $_POST['link'];
			
			$id = $_POST['news'];
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
				
				// Check if file already exists
				if (file_exists($tmb_target_file) || file_exists($tmb_target_file)) 
				{
					/*echo "<script>alert('Sorry, file already exists.');</script>";*/
					// $uploadOk = 0;
					$r=rand();
					$tmb_target_file = $tmb_target_dir .$r.($_FILES["Image_up"]["name"]);
					$org_target_file = $org_target_dir .$r.($_FILES["Image_up"]["name"]);   
					$f=$r.$_FILES["Image_up"]["name"]; 
				}
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
							$d2 = compress($source_img, $org_destination_img, 70);	
							if ($d && $d2) 
							{
								$tmb_path=$tmb_target_file;	
								$org_path=$org_target_file;
								
								
								
								//unlink old image
								$table_name = 'news';
									$pic="";    
									$result="SELECT image FROM $table_name WHERE news_id=$id;";
									$q1=mysql_query($result);
									if ($r = mysql_fetch_array($q1)) 
									{
									$pic=$r['image'];
									}
									
									if (file_exists('../../../assets/images/news/thumb/'.$pic) && $pic) 
					                {
					                unlink("../../../assets/images/news/thumb/"."$pic");
					                }
					                if (file_exists('../../../assets/images/news/'.$pic) && $pic) 
					                {
					                unlink("../../../assets/images/news/"."$pic");
					                }
					               

								
								
							    $status=1;

								$query1 = "UPDATE `".$table_name."` SET `title` = '".$title."',`description` = '".$description."', `link` = '".$link."',`image` = '".$f."' WHERE `news_id` = ".$id.";";
								$q1=mysql_query($query1);
								
									
									if($q1)
									{
									$message = "Updated Sucessfully";	
									}
									else
									{
									$message = "Opps Somthing whent wrong";
									}
							}		
				   	 }
				 }
				 else
				 {
                    $status=1;
				    $table_name = 'news';	
					$query1 = "UPDATE `".$table_name."` SET `title` = '".$title."',`description` = '".$description."', `link` = '".$link."' WHERE `news_id` = ".$id.";";
					$q1=mysql_query($query1);
					if($q1)
					{
					$message = "Updated Sucessfully";	
					}
					else
					{
					$message = "Opps Somthing whent wrong";
					}
				 }
				header("Location:../news.php?msg=".urlencode(base64_encode($message)));
		 }
		 //event..............
	 if (isset($_POST['event']))
		{
			
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
			$id = $_POST['event'];
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
				
				
					/*echo "<script>alert('Sorry, file already exists.');</script>";*/
					// $uploadOk = 0;
					$r=rand();
					$tmb_target_file = $tmb_target_dir .$r.($_FILES["Image_up"]["name"]);
					$org_target_file = $org_target_dir .$r.($_FILES["Image_up"]["name"]);   
					$f=$r.$_FILES["Image_up"]["name"]; 
				
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
							$d2 = compress($source_img, $org_destination_img, 70);	
							if ($d && $d2) 
							{
								$tmb_path=$tmb_target_file;	
								$org_path=$org_target_file;
								
								
								
								//unlink old image
								$table_name = 'events';
									$pic="";    
									$result="SELECT image FROM $table_name WHERE event_id=$id;";
									$q1=mysql_query($result);
									if ($r = mysql_fetch_array($q1)) 
									{
									$pic=$r['image'];
									}
									
									if (file_exists('../../../assets/images/events/thumb/'.$pic) && $pic) 
					                {
					                unlink("../../../assets/images/events/thumb/"."$pic");
					                }
					                if (file_exists('../../../assets/images/events/'.$pic) && $pic) 
					                {
					                unlink("../../../assets/images/events/"."$pic");
					                }
					               

								
								
							    $status=1;

								$query1 = "UPDATE `".$table_name."` SET `title` = '".$title."',`discription` = '".$description."', `link` = '".$link."',`image` = '".$f."',`place`= '".$place."' ,`date`= '".$ndate."' WHERE `event_id` = ".$id.";";
								$q1=mysql_query($query1);
								
									
									if($q1)
									{
									$message = "Updated Sucessfully";	
									}
									else
									{
									$message = "Opps Somthing whent wrong";
									}
							}		
				   	 }
				 }
				 else
				 {
                    $status=1;
				    $table_name = 'events';	
					$query1 = "UPDATE `".$table_name."` SET `title` = '".$title."',`discription` = '".$description."', `link` = '".$link."',`place`= '".$place."' ,`date`= '".$ndate."' WHERE `event_id` = ".$id.";";
					$q1=mysql_query($query1);
					if($q1)
					{
					$message = "Updated Sucessfully";	
					}
					else
					{
					$message = "Opps Somthing whent wrong";
					}
				 }
				header("Location:../event.php?msg=".urlencode(base64_encode($message)));
		 }
		 //blog.........................

	 if (isset($_POST['blog']))
		{  //echo "hjhgghj" ;
			$id=$_POST['blog'];
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
			$query1="UPDATE `blog` SET `title`='".$title."',`author`='".$author."',`date`='".$ndate."',`image1desc`='".$image1description."',`image1title`='".$image1title."',`videolink`='".$videolink."',`videotitle`='".$videotitle."',`image2desc`='".$image2description."' ,`image2title`='".$image2title."',`status`='".$statusvalue."' WHERE id='".$id."'";
	    	
			$q1=mysql_query($query1);
			$message = "Updated Sucessfully";	
			if($q1)
			{ 	

				$selectquery="SELECT `image1`,`image2`FROM `blog` WHERE id='".$id."'";
				$queryselect=mysql_query($selectquery);
				if($imageData=mysql_fetch_array($queryselect)){
					$image1=$imageData['image1'];
					$image2=$imageData['image2'];	
				}
				$sqlquery2="UPDATE   `blogcontent`  SET content ='".$description."'  where blog_id ='".$id."'";
				$query2=mysql_query($sqlquery2);
				
				//image1.....................................................
			 	$f=$_FILES["Image"]["name"];
				if($f!="")
				{
					unlink("../../../assets/images/blog/".$image1);
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
							
							}
							else
							{
									$message = "Opps Somthing whent wrong";	
							}
						}
				  }
				}
				//image2.....................................................
			 	$f2=$_FILES["Image2"]["name"];
				if($f2!="")
				{   
					unlink("../../../assets/images/blog/".$image2);
					$r="";
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
							
							}
							else
							{
							$message = "Opps Somthing whent wrong";	
							}
						}
				  }
				}

			
				header("Location:../blog.php?msg=".urlencode(base64_encode($message)));
		 	}
		}
		 if (isset($_GET['blogstatus']))
		{ 
			 $id=$_GET['blogstatus'];
			$selectquery="SELECT status FROM `blog` WHERE id='".$id."'";
				$queryselect=mysql_query($selectquery);
				if($imageData=mysql_fetch_array($queryselect)){
					$status=$imageData['status'];
				}
				if($status=='1'){
					$status=0;
				}else{
					$status=1;
				}
				 $sql ="update blog set status='".$status."' where id='".$id."'";
				$q=mysql_query($sql);
				if($q){
					header("Location:../blog.php");
				}else{
					header("Location:../blog.php?error");
				}
		}
		if(isset($_POST['editboardofdirector']))
		{
			$directorid=$_POST['id'];
			$name=$_POST['name'];
			$uploadError="";
			$workexperience=$_POST['workexperience'];
			$position=$_POST['position'];
			$qualification=$_POST['qualification'];
			$oldphoto=$_POST['oldphoto'];
			$oldphotopath="../../../assets/images/boarddirectors/".$oldphoto;
			$photo=$_FILES["photo"]["name"];	        
	        $table_name="boardofdirectors";
	        if($photo!="")
	        {
              if(file_exists($oldphotopath))
	          {
	            
	            $photo_type=$_FILES['photo']['type'];
	            
	            if($photo_type=="image/jpeg"|| $photo_type=="image/png") 
				{
					unlink($oldphotopath);
				  	$randf=rand();
					$target_dir="../../../assets/images/boarddirectors/";				
				    $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		            $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		           
	                if($photo_type=="image/jpeg" || $photo_type=="image/png")
					{
						$tempfile=$_FILES["photo"]["tmp_name"];
						$d1 = compress($tempfile,$target_file,40);
						if($d1)
						{
						  $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`workexperience` = '$workexperience',`position` = '$position',`qualification` = '$qualification',`image` = '$newtargetfile' WHERE `id` = ".$directorid.";";
						}
					}
					
			        
				}
				else
				{
	                $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`workexperience` = '$workexperience',`position` = '$position',`qualification` = '$qualification' WHERE `id` = ".$directorid.";";

	                
				}
	          }
	        }
	        else
	        {
                $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`workexperience` = '$workexperience',`position` = '$position',`qualification` = '$qualification' WHERE `id` = ".$directorid.";";

	              
	        }
	        $ql=mysql_query($query1);
	        if($ql)
	        {
	        	$message = "Successfully Updated";
				header("Location:../boardofdirectors.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../boardofdirectors.php');
	        }
	        
		}
		if(isset($_POST['editartist']))
		{
			$artistid=$_POST['id'];
			$name=$_POST['name'];
			$fbid=$_POST['fbid'];
			$webid=$_POST['webid'];
			 $workexperience=$_POST['workexperience'];
		     $profiledescription=$_POST['profiledescription'];
			$qualification=$_POST['qualification'];
			$oldphoto=$_POST['oldphoto'];
			$oldphotopath="../../../assets/images/artists/".$oldphoto;
		    $photo=$_FILES["photo"]["name"];	        
	        $table_name="artists";
	        if($photo!="")
	        {
              if(file_exists($oldphotopath))
	          {
	            
	            $photo_type=$_FILES['photo']['type'];
	            
	            if($photo_type=="image/jpeg"|| $photo_type=="image/png") 
				{
					unlink($oldphotopath);
				  	$randf=rand();
					$target_dir="../../../assets/images/artists/";				
				    $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		            $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		           
	                if($photo_type=="image/jpeg" || $photo_type=="image/png")
					{
						$tempfile=$_FILES["photo"]["tmp_name"];
						$d1 = compress($tempfile,$target_file,40);
						if($d1)
						{
						  $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`workexperience` = '$workexperience',`qualification` = '$qualification',`image` = '$newtargetfile',`facebookid`='$fbid',`websiteid`='$webid',`profiledescription`='$profiledescription' WHERE `id` = ".$artistid.";";
						}
					}
					
			        
				}
				else
				{
	                $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`workexperience` = '$workexperience',`qualification` = '$qualification',`facebookid`='$fbid',`websiteid`='$webid',`profiledescription`='$profiledescription' WHERE `id` = ".$artistid.";";

	                
				}
	          }
	        }
	        else
	        {
                $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`workexperience` = '$workexperience',`qualification` = '$qualification',`facebookid`='$fbid',`websiteid`='$webid',`profiledescription`='$profiledescription' WHERE `id` = ".$artistid.";";

	              
	        }
	        $ql=mysql_query($query1);
	        if($ql)
	        {
	        	$message = "Successfully Updated";
				header("Location:../artistprofiles.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../artistprofiles.php');
	        }

		}

		if(isset($_POST['editcourse']))
		{
            $courseid=$_POST['id'];
			$name=$_POST['name'];	
			$subheading=$_POST['subheading'];
			$type=$_POST['category'];		
			$description=$_POST['description'];
			
		  
			$oldphoto=$_POST['oldphoto'];
			$oldphotopath="../../../assets/images/courses/".$oldphoto;
		    $photo=$_FILES["photo"]["name"];	        
	        $table_name="courses";
	         if($photo!="")
	        {
                if(file_exists($oldphotopath))
	            {
	            
		            $photo_type=$_FILES['photo']['type'];
		            
		            
						$randf=rand();
						$target_dir="../../../assets/images/courses/";				
				        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		                $tempfile=$_FILES["photo"]["tmp_name"];
						unlink($oldphotopath);
						
						if(move_uploaded_file($tempfile,$target_file)) 
						{
							
							$query1 = "UPDATE `".$table_name."` SET `name` = '$name',`subheading`='$subheading' ,`description` = '$description',`image` = '$newtargetfile',`type`='$type' WHERE `id` = ".$courseid.";";
							
							
						}
					
						
						
					
				}
			}
			else
			{
				$query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`subheading`='$subheading' ,`description` = '$description',`type`='$type' WHERE `id` = ".$courseid.";";
				 

			}
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully Updated";
				header("Location:../courses.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../courses.php');
	        }
		}

		if(isset($_POST['editebrochure']))
		{
            $ebrochureid=$_POST['id'];
			$title=$_POST['title'];			
			
			$oldphoto=$_POST['oldphoto'];
			$oldphotopath="../../../assets/images/ebrochure/".$oldphoto;
		    $photo=$_FILES["photo"]["name"];	        
	        $table_name="ebrochures";
	        if($photo!="")
	        {
                if(file_exists($oldphotopath))
	            {
	            
		            $photo_type=$_FILES['photo']['type'];
		            
		            if($photo_type=="image/jpeg"|| $photo_type=="image/png" ||$photo_type=="application/pdf") 
					{
						
						$randf=rand();
						$target_dir="../../../assets/images/ebrochure/";				
				        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		                $tempfile=$_FILES["photo"]["tmp_name"];
		                unlink($oldphotopath);

						if($photo_type=="image/jpeg" || $photo_type=="image/png") 
						{
							
							$d1 = compress($tempfile,$target_file,40);
							if($d1)
							{
								$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`filename` = '$newtargetfile' WHERE `id` = ".$ebrochureid.";";
						    }
						}
						else
						{
							if(move_uploaded_file($tempfile,$target_file)) 
							{
								
								$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`filename` = '$newtargetfile' WHERE `id` = ".$ebrochureid.";";
								
								
							}
						}
						$q1=mysql_query($query1);
						
					}
				}
			}
			else
			{
				 $query1 = "UPDATE `".$table_name."` SET `title` = '$title'  WHERE `id` = ".$ebrochureid.";";
				 $q1=mysql_query($query1);

			}
			
			if($q1)
	        {
	        	$message = "Successfully Updated";
				header("Location:../ebrochures.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../ebrochures.php');
	        }
		}

		elseif (isset($_POST['editapplicationform'])) 
		{
			$formid=$_POST['id'];
			$title=$_POST['title'];			
			
			$oldphoto=$_POST['oldphoto'];
			$oldphotopath="../../../assets/images/applicationforms/".$oldphoto;
		    $photo=$_FILES["photo"]["name"];	        
	        $table_name="applicationforms";
	        if($photo!="")
	        {
                if(file_exists($oldphotopath))
	            {
	            
		            $photo_type=$_FILES['photo']['type'];
		            
		            if($photo_type=="image/jpeg"|| $photo_type=="image/png" ||$photo_type=="application/pdf") 
					{
						
						$randf=rand();
						$target_dir="../../../assets/images/applicationforms/";				
				        $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		                $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		                $tempfile=$_FILES["photo"]["tmp_name"];
		                unlink($oldphotopath);

						if($photo_type=="image/jpeg" || $photo_type=="image/png") 
						{
							
							$d1 = compress($tempfile,$target_file,40);
							if($d1)
							{
								$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`filename` = '$newtargetfile' WHERE `id` = ".$formid.";";
						    }
						}
						else
						{
							if(move_uploaded_file($tempfile,$target_file)) 
							{
								
								$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`filename` = '$newtargetfile' WHERE `id` = ".$formid.";";
								
								
							}
						}
						$q1=mysql_query($query1);
						
					}
				}
			}
			else
			{
				 $query1 = "UPDATE `".$table_name."` SET `title` = '$title'  WHERE `id` = ".$formid.";";
				 $q1=mysql_query($query1);

			}
			
			if($q1)
	        {
	        	$message = "Successfully Updated";
				header("Location:../applicationforms.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../applicationforms.php');
	        }
		}
		elseif (isset($_POST['addinfoawards'])) 
		{
			$id=$_POST['id'];
			$title=$_POST['title'];
			$board=$_POST['board'];
			$description=$_POST['description'];
			$table_name="boarddirectorawards";
			$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`description` = '$description' WHERE `id` = ".$id.";";
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully Info Added";
				header("Location:../manageawards.php?board=".$board."&msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../manageawards.php?board='.$board);
	        }

		}
		elseif (isset($_POST['addinfocertificates'])) 
		{
			$id=$_POST['id'];
			$title=$_POST['title'];
			$artist=$_POST['artist'];
			$description=$_POST['description'];
			$table_name="artistcertificates";
			$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`description` = '$description' WHERE `id` = ".$id.";";
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully Info Added";
				header("Location:../managecertificates.php?artist=".$artist."&msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../managecertificates.php?artist='.$artist);
	        }

		}
		if(isset($_POST['edittimeline']))
		{
			$id=$_POST['id'];
			$title=$_POST['title'];
			$date=$_POST['form_datetime'];
			
            $datearr=array();
			
            $datearr=explode('/',$date);
            $day=$datearr[0];
            $month=$datearr[1];
            $year=$datearr[2];
			$description=$_POST['description'];
			$table_name="activities";
			$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`description` = '$description',`day`='$day',`month`='$month',`year`='$year' WHERE `id` = ".$id.";";
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully Updated";
				header("Location:../timeline.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../timeline.php');
	        }
		}
		elseif (isset($_POST['addgalleryinfo'])) 
		{
			$id=$_POST['id'];
			$title=$_POST['title'];		
			$description=$_POST['description'];
			$table_name="gallery";
			$subcategoryid=$_POST['subcategoryid'];
			
			
			$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`description` = '$description' WHERE `id` = ".$id.";";
			
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	
				
	        	$message = "Successfully Info Added";
				header("Location:../uploadgallery.php?id=".urlencode(base64_encode($subcategoryid))."&msg=".urlencode(base64_encode($message)));	              
	        	

	        }
	        else
	        {
	        	header('Location: ../uploadgallery.php?id='.urlencode(base64_encode($subcategoryid)));
	        }
		}
		elseif (isset($_POST['editgalleryinfo'])) 
		{
			$id=$_POST['id'];
			$title=$_POST['title'];
			$enid=$_POST['enid'];
			
			$description=$_POST['description'];
		
			$table_name="gallery";
		
			$query1 = "UPDATE `".$table_name."` SET `title` = '$title' ,`description` = '$description' WHERE `id` = ".$id.";";
			
			
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	
				
	        	$message = "Successfully Info updated";
				header("Location:../uploadgallery.php?id=".$enid."&msg=".urlencode(base64_encode($message)));	               
	        	

	        }
	        else
	        {
	        	header('Location: ../uploadgallery.php?id='.$enid);
	        }
		}
		if(isset($_POST['editalbumdetails']))
		{
			$albumid=$_POST['id'];
			$name=$_POST['name'];
			
			$description=$_POST['description'];
			$enid=$_POST['categoryid'];
			
			$oldphoto=$_POST['oldphoto'];
			$oldphotopath="../../../assets/images/gallery/".$oldphoto;
			$photo=$_FILES["photo"]["name"];	        
	        $table_name="gallerysubcategory";
	        if($photo!="")
	        {
              if(file_exists($oldphotopath))
	          {
	            
	                $photo_type=$_FILES['photo']['type'];
	            
	            
					unlink($oldphotopath);
				  	$randf=rand();
					$target_dir="../../../assets/images/gallery/";				
				    $target_file= $target_dir .$randf.'_'. basename($_FILES["photo"]["name"]);
		            $newtargetfile=$randf.'_'. basename($_FILES["photo"]["name"]);
		           
	                	$tempfile=$_FILES["photo"]["tmp_name"];
						$d1 = compress($tempfile,$target_file,40);
						if($d1)
						{
						  $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`description` = '$description',`coverimage` = '$newtargetfile' WHERE `id` = ".$albumid.";";
						}
					
					
			        
				
				
	          }
	        }
	        else
	        {
               $query1 = "UPDATE `".$table_name."` SET `name` = '$name' ,`description` = '$description' WHERE `id` = ".$albumid.";";

	              
	        }
	       $ql=mysql_query($query1);
	        if($ql)
	        {
	        	$message = "Successfully Updated";
				header("Location:../managegallery.php?id=".$enid."&msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../managegallery.php?id='.$enid);
	        }
		}
		if(isset($_POST['editgallerycategory']))
		{
			$id=$_POST['id'];
			$category=$_POST['category'];
		
			$table_name="gallerycategory";
			$query1 = "UPDATE `".$table_name."` SET `category` = '$category' WHERE `id` = ".$id.";";
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully Updated";
				header("Location:../gallery.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../gallery.php');
	        }
		}
		if(isset($_POST['courseenglish']))
		{
			$courseid=$_POST['id'];
			$ename=$_POST['ename'];	
			$esubheading=$_POST['esubheading'];
			$etype=$_POST['ecategory'];		
			$edescription=$_POST['edescription'];
			        
	        $table_name="courses";



	        
	            
							
							$query1 = "UPDATE `".$table_name."` SET `e_name` = '$ename',`e_subheading`='$esubheading' ,`e_description` = '$edescription',`e_type`='$etype' WHERE `id` = ".$courseid.";";
							
						
					
						
						
					
				
			
			
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully content saved";
				header("Location:../courses.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../courses.php');
	        }
		}
		
		if(isset($_POST['albumdetailsenglish']))
		{
			$albumid=$_POST['id'];
			$ename=$_POST['ename'];
			
			$edescription=$_POST['edescription'];
			$enid=$_POST['categoryid'];
			
		        
	        $table_name="gallerysubcategory";
	        
              
	            
	               
			 $query1 = "UPDATE `".$table_name."` SET `e_name` = '$ename' ,`e_description` = '$edescription' WHERE `id` = ".$albumid.";";
						
					
					
			        
				
				
	          
	        
	       $ql=mysql_query($query1);
	        if($ql)
	        {
	        	$message = "Successfully content saved";
				header("Location:../managegallery.php?id=".$enid."&msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../managegallery.php?id='.$enid);
	        }
		}
		if(isset($_POST['eventenglish']))
		{
			$etitle = $_POST['etitle'];
			$edescription = $_POST['edescription'];
			
			$eplace = $_POST['eplace'];
			
			$id = $_POST['eventenglish'];
			//var_dump($_POST);
		
                    
				    $table_name = 'events';	
					echo $query1 = "UPDATE `".$table_name."` SET `e_title` = '".$etitle."',`e_discription` = '".$edescription."',`e_place`= '".$eplace."'  WHERE `event_id` = ".$id.";";
					$q1=mysql_query($query1);
					if($q1)
					{
					$message = "Sucessfully content saved";	
					}
					else
					{
					$message = "Opps Somthing whent wrong";
					}
				 
				header("Location:../event.php?msg=".urlencode(base64_encode($message)));
		}
		if(isset($_POST['timelineenglish']))
		{
			$id=$_POST['id'];
			$etitle=$_POST['etitle'];
			
			$edescription=$_POST['edescription'];
			$table_name="activities";
			$query1 = "UPDATE `".$table_name."` SET `e_title` = '$etitle' ,`e_description` = '$edescription'WHERE `id` = ".$id.";";
			$q1=mysql_query($query1);
			if($q1)
	        {
	        	$message = "Successfully Content Saved";
				header("Location:../timeline.php?msg=".urlencode(base64_encode($message)));
	              
	        	

	        }
	        else
	        {
	        	header('Location: ../timeline.php');
	        }
		}

					
			    
		

}
else 
{
}
?>