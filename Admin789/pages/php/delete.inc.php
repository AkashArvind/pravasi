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

	
	//..................................testimony deleted....................................

	if(isset($_REQUEST["testimony"])) 
	{	
	    unset($_REQUEST['testimony']);
	    $hasvar = false;
    	foreach ($_REQUEST as $variable) 
    	{
        	if (is_numeric($variable)) 
        	{ 
	            $hasvar = true;
				
				$table_name = "testimony";
				$query_delete = "DELETE FROM ".$table_name." WHERE id= ".$variable."";
				$q_delete=mysql_query($query_delete);
            	if (!$q_delete)
            	{
               		if (mysql_errno () == 1451) //Children are dependent value
                    	$_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                	else
                    	$_GLOBALS['message'] = mysql_errno();
            	}    
        	}
    	}
    	if (!isset($_GLOBALS['message']) && $hasvar == true)
       		$message = "Successfully Deleted";

    	else if (!$hasvar) 
    	{
        	$message= "First Select to Delete.";
    	}
        header("Location:../testimony.php?msg=".urlencode(base64_encode($message)));
	}

    //..................................videos deleted....................................

    if(isset($_REQUEST["videos"])) 
    {   
        unset($_REQUEST['delete']);
        $hasvar = false;
        foreach ($_REQUEST as $variable) 
        {
            if (is_numeric($variable)) 
            { 
                $hasvar = true;
                
                $table_name = "videos";
                $query_delete = "DELETE FROM ".$table_name." WHERE id= ".$variable."";
                $q_delete=mysql_query($query_delete);
                if (!$q_delete)
                {
                    if (mysql_errno () == 1451) //Children are dependent value
                        $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                    else
                        $_GLOBALS['message'] = mysql_errno();
                }    
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $_GLOBALS['message'] = "Successfully Deleted";
        else if (!$hasvar) 
        {
            $_GLOBALS['message'] = "First Select to Delete.";
        }
    }
	
	
	//..................................gallery deleted....................................

	else if(isset($_REQUEST["photodel"])) 
    {   
        
        $enid=$_REQUEST['enid'];
       
        unset($_REQUEST['enid']);
     
        
        unset($_REQUEST['photodel']);
        unset($_REQUEST['example_length']);
        

        $hasvar = false;
        foreach ($_REQUEST as $variable) 
        {
            if (is_numeric($variable)) 
            { 
                $hasvar = true;     
                $table_name = "gallery";   
                $img="select imagename FROM ".$table_name." WHERE id= ".$variable."";
                $image=mysql_query($img);
                if($row=mysql_fetch_array($image))
                {
                 $pic=$row['imagename'];
                
                }
                
               if (file_exists('../../../assets/images/gallery/'.$pic)) 
                {
                unlink("../../../assets/images/gallery/".$pic);
                }
               
                
                $query_delete = "DELETE FROM ".$table_name." WHERE id= ".$variable."";
                $q_delete=mysql_query($query_delete);
                if (!$q_delete)
                {
                    if (mysql_errno () == 1451) //Children are dependent value
                        $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                    else
                        $_GLOBALS['message'] = mysql_errno();
                }    
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
        {
            $message = "Successfully Deleted";
        }
        else 
        {
            $message = "First Select item to Delete.";
        }
         header("Location:../uploadgallery.php?id=".urlencode(base64_encode($enid))."&msg=".urlencode(base64_encode($message)));
    }

    elseif (isset($_REQUEST['eventphotoddel'])) 
    {
        $enid=$_REQUEST['enid'];
       
        unset($_REQUEST['enid']);
     
        
        unset($_REQUEST['eventphotoddel']);
        unset($_REQUEST['example_length']);
        

        $hasvar = false;
        foreach ($_REQUEST as $variable) 
        {
            if (is_numeric($variable)) 
            { 
                $hasvar = true;     
                $table_name = "eventphotos";   
                $img="select filename FROM ".$table_name." WHERE id= ".$variable."";
                $image=mysql_query($img);
                if($row=mysql_fetch_array($image))
                {
                 $pic=$row['filename'];
                
                }
                
               if (file_exists('../../../assets/images/events/'.$pic)) 
                {
                unlink("../../../assets/images/events/".$pic);
                }
               
                
                $query_delete = "DELETE FROM ".$table_name." WHERE id= ".$variable."";
                $q_delete=mysql_query($query_delete);
                if (!$q_delete)
                {
                    if (mysql_errno () == 1451) //Children are dependent value
                        $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                    else
                        $_GLOBALS['message'] = mysql_errno();
                }    
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
        {
            $message = "Successfully Deleted";
        }
        else 
        {
            $message = "First Select item to Delete.";
        }
         header("Location:../manageeventphotos.php?event=".urlencode(base64_encode($enid))."&msg=".urlencode(base64_encode($message)));

        
    }
		
	//..................................news deleted....................................

	else if(isset($_REQUEST["News"])) 
	{	
	    unset($_REQUEST['News']);
        unset($_REQUEST['example_length']);        
	    $hasvar = false;
    	foreach ($_REQUEST as $variable) 
    	{
        	if (is_numeric($variable)) 
        	{ 
	            $hasvar = true;		
				$table_name = "news";	
				$img="select image FROM ".$table_name." WHERE news_id= ".$variable."";
                $image=mysql_query($img);
                while($row=mysql_fetch_array($image))
                {
                $pic=$row['image'];
                }
                if (file_exists('../../../assets/images/news/thumb/'.$pic) && $pic) 
                {
                unlink("../../../assets/images/news/thumb/"."$pic");
                }
                if (file_exists('../../../assets/images/news/'.$pic) && $pic) 
                {
                unlink("../../../assets/images/news/"."$pic");
                }              
				$query_delete = "DELETE FROM ".$table_name." WHERE news_id= ".$variable."";
				$q_delete=mysql_query($query_delete);
            	if (!$q_delete)
            	{
               		if (mysql_errno () == 1451) //Children are dependent value
                    	$_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                	else
                    	$_GLOBALS['message'] = mysql_errno();
            	} 

        	}
    	}
    	if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../news.php?msg=".urlencode(base64_encode($message)));
	}
  //events.......................

    else if(isset($_REQUEST["Events"])) 
    {   
        unset($_REQUEST['Events']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {    
            if (is_numeric($variable)) 
            {  
                $table_name1 = "events";   
                 
               
                $img="select image FROM ".$table_name1." WHERE event_id= ".$variable."";
                $image=mysql_query($img);
                while($row=mysql_fetch_array($image))
                {
                $pic=$row['image'];
                }
                if (file_exists('../../../assets/images/events/thumb/'.$pic) && $pic) 
                {
                unlink("../../../assets/images/events/thumb/"."$pic");
                }
                if (file_exists('../../../assets/images/events/'.$pic) && $pic) 
                {
                unlink("../../../assets/images/events/"."$pic");
                } 
               

                $table_name2 = "eventphotos";   
                $file2="select filename FROM ".$table_name2." WHERE eventid= ".$variable."";
                $fileEx2=mysql_query($file2);
                while($row2=mysql_fetch_array($fileEx2))
                {
                    $FileName2=$row2['filename'];
                    if (file_exists('../../../assets/images/events/'.$FileName2)) 
                    {
                        unlink("../../../assets/images/events/".$FileName2);
                    }
                }
                
                
                $query_delete3 = "DELETE FROM ".$table_name2." WHERE eventid= ".$variable."";
                $q_delete3=mysql_query($query_delete3);

               
                $query_delete4 = "DELETE FROM ".$table_name1." WHERE event_id= ".$variable."";
                $q_delete4=mysql_query($query_delete4);
                if($q_delete4)
                {
                    $hasvar="true";
                }
            }
        } 
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../event.php?&msg=".urlencode(base64_encode($message)));
    }
    //blog.........................
    else if(isset($_REQUEST["blog"])) 
    {   
        unset($_REQUEST['blog']);
        unset($_REQUEST['example_length']);        
        $hasvar = false;
        foreach ($_REQUEST as $variable) 
        {
            if (is_numeric($variable)) 
            { 
                $hasvar = true;     
                $table_name = "blog";   
                $img="select `image1`,`image2` FROM ".$table_name." WHERE id= ".$variable."";
                $image=mysql_query($img);
                while($row=mysql_fetch_array($image))
                {
                $pic=$row['image1'];
                $pic2=$row['image2'];
                }
                if (file_exists('../../../assets/images/blog/thumb/'.$pic) && $pic) 
                {
                unlink("../../../assets/images/blog/thumb/"."$pic");
                }
                if (file_exists('../../../assets/images/blog/'.$pic) && $pic) 
                {
                unlink("../../../assets/images/blog/"."$pic");
                }
                if (file_exists('../../../assets/images/blog/thumb/'.$pic2) && $pic2) 
                {
                unlink("../../../assets/images/blog/thumb/"."$pic2");
                }
                if (file_exists('../../../assets/images/blog/'.$pic2) && $pic2) 
                {
                unlink("../../../assets/images/blog/"."$pic2");
                }                 
                $query_delete = "DELETE FROM ".$table_name." WHERE id= ".$variable."";
                $q_delete=mysql_query($query_delete);
                if (!$q_delete)
                {
                    if (mysql_errno () == 1451) //Children are dependent value
                        $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                    else
                        $_GLOBALS['message'] = mysql_errno();
                }else{
                    $delete = "DELETE FROM blogcontent WHERE blog_id= ".$variable."";
                    $delete=mysql_query($delete);
                } 

            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../blog.php?msg=".urlencode(base64_encode($message)));
    }

    elseif (isset($_REQUEST['awarddel'])) 
    {
        $directorid=$_REQUEST['directorid'];
        unset($_REQUEST['directorid']);
        unset($_REQUEST['awarddel']);
        unset($_REQUEST['example_length']);   
        foreach ($_REQUEST as $variable) 
        {    
            if (is_numeric($variable)) 
            {  
                $table_name1 = "boarddirectorawards";   
                $file="select filename FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx=mysql_query($file);
                if($row=mysql_fetch_array($fileEx))
                {   
                    
                    $FileName=$row['filename'];
                    if (file_exists('../../../assets/images/boarddirectorawards/'.$FileName)) 
                    {
                        unlink("../../../assets/images/boarddirectorawards/".$FileName);
                    }
                }
                
                
                $query_delete2 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete2=mysql_query($query_delete2);

                
                if($q_delete2)
                {
                    $hasvar=true;
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../manageawards.php?board=".urlencode(base64_encode($directorid))."&msg=".urlencode(base64_encode($message)));
           
    }	
    elseif (isset($_REQUEST['boarddirectordel']))
    {
        
        unset($_REQUEST['boarddirectordel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {    
            if (is_numeric($variable)) 
            {  
                $table_name1 = "boardofdirectors";   
                
                $file1="select image FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx1=mysql_query($file1);
                if($row1=mysql_fetch_array($fileEx1))
                {
                    $FileName1=$row1['image'];
                    if (file_exists('../../../assets/images/boarddirectors/'.$FileName1)) 
                    {
                        unlink("../../../assets/images/boarddirectors/".$FileName1);
                    }

                }

                $table_name2 = "boarddirectorawards";   
                $file2="select filename FROM ".$table_name2." WHERE directorid= ".$variable."";
                $fileEx2=mysql_query($file2);
                while($row2=mysql_fetch_array($fileEx2))
                {
                    $FileName2=$row2['filename'];
                    if (file_exists('../../../assets/images/boarddirectorawards/'.$FileName2)) 
                    {
                        unlink("../../../assets/images/boarddirectorawards/".$FileName2);
                    }
                }
                
                
                $query_delete3 = "DELETE FROM ".$table_name2." WHERE directorid= ".$variable."";
                $q_delete3=mysql_query($query_delete3);

               
                $query_delete4 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete4=mysql_query($query_delete4);
                if($q_delete4)
                {
                    $hasvar="true";
                }
            }
        } 
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../boardofdirectors.php?&msg=".urlencode(base64_encode($message))); 
    }

    elseif (isset($_REQUEST['certificatedel'])) 
    {
        $artistid=$_REQUEST['artistid'];
        unset($_REQUEST['artistid']);
        unset($_REQUEST['certificatedel']);
        unset($_REQUEST['example_length']);   
        foreach ($_REQUEST as $variable) 
        {    
            if (is_numeric($variable)) 
            {  
                $table_name1 = "artistcertificates";   
                $file="select filename FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx=mysql_query($file);
                if($row=mysql_fetch_array($fileEx))
                {   
                    
                    $FileName=$row['filename'];
                    if (file_exists('../../../assets/images/artistcertificates/'.$FileName)) 
                    {
                        unlink("../../../assets/images/artistcertificates/".$FileName);
                    }
                }
                
                
                $query_delete2 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete2=mysql_query($query_delete2);

                
                if($q_delete2)
                {
                    $hasvar=true;
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../managecertificates.php?artist=".urlencode(base64_encode($artistid))."&msg=".urlencode(base64_encode($message)));
    }
    elseif (isset($_REQUEST['artistdel'])) 
    {
        unset($_REQUEST['artistdel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {    
            if (is_numeric($variable)) 
            {  
                $table_name1 = "artists";   
                
                $file1="select image FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx1=mysql_query($file1);
                if($row1=mysql_fetch_array($fileEx1))
                {
                    $FileName1=$row1['image'];
                    if (file_exists('../../../assets/images/artists/'.$FileName1)) 
                    {
                        unlink("../../../assets/images/artists/".$FileName1);
                    }

                }

                $table_name2 = "artistcertificates";   
                $file2="select filename FROM ".$table_name2." WHERE artistid= ".$variable."";
                $fileEx2=mysql_query($file2);
                while($row2=mysql_fetch_array($fileEx2))
                {
                    $FileName2=$row2['filename'];
                    if (file_exists('../../../assets/images/artistcertificates/'.$FileName2)) 
                    {
                        unlink("../../../assets/images/artistcertificates/".$FileName2);
                    }
                }
                $table_name3=" artistimages";
                $file3="select imagename FROM ".$table_name3." WHERE artistid= ".$variable."";
                $fileEx3=mysql_query($file3);
                while($row3=mysql_fetch_array($fileEx3))
                {
                    $FileName3=$row3['imagename'];
                    if (file_exists('../../../assets/images/artists/'.$FileName3)) 
                    {
                        unlink("../../../assets/images/artists/".$FileName3);
                    }
                }
                $query_delete2 = "DELETE FROM ".$table_name3." WHERE artistid= ".$variable."";
                $q_delete2=mysql_query($query_delete2);
                
                $query_delete3 = "DELETE FROM ".$table_name2." WHERE artistid= ".$variable."";
                $q_delete3=mysql_query($query_delete3);

               
                $query_delete4 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete4=mysql_query($query_delete4);
                if($q_delete4)
                {
                    $hasvar="true";
                }
            }
        } 
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../artistprofiles.php?&msg=".urlencode(base64_encode($message))); 
    }
    elseif (isset($_REQUEST['coursedel'])) 
    {
        unset($_REQUEST['coursedel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {
           if (is_numeric($variable)) 
            {  
                $table_name1 = "courses";   
                
                $file1="select image FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx1=mysql_query($file1);
                if($row1=mysql_fetch_array($fileEx1))
                {
                    $FileName1=$row1['image'];
                    if (file_exists('../../../assets/images/courses/'.$FileName1)) 
                    {
                        unlink("../../../assets/images/courses/".$FileName1);
                    }

                }

                $query_delete1 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete1=mysql_query($query_delete1);
                if($q_delete1)
                {
                    $hasvar="true";
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../courses.php?&msg=".urlencode(base64_encode($message))); 

    }
    elseif (isset($_REQUEST['ebrochuredel'])) 
    {
        unset($_REQUEST['ebrochuredel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {
           if (is_numeric($variable)) 
            {  
                $table_name1 = "ebrochures";   
                
                $file1="select filename FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx1=mysql_query($file1);
                if($row1=mysql_fetch_array($fileEx1))
                {
                    $FileName1=$row1['filename'];
                    if (file_exists('../../../assets/images/ebrochure/'.$FileName1)) 
                    {
                        unlink("../../../assets/images/ebrochure/".$FileName1);
                    }

                }

                $query_delete1 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete1=mysql_query($query_delete1);
                if($q_delete1)
                {
                    $hasvar="true";
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../ebrochures.php?&msg=".urlencode(base64_encode($message))); 

    }
    elseif (isset($_REQUEST['applicationformdel'])) 
    {
        unset($_REQUEST['applicationformdel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {
           if (is_numeric($variable)) 
            {  
                $table_name1 = "applicationforms";   
                
                $file1="select filename FROM ".$table_name1." WHERE id= ".$variable."";
                $fileEx1=mysql_query($file1);
                if($row1=mysql_fetch_array($fileEx1))
                {
                    $FileName1=$row1['filename'];
                    if (file_exists('../../../assets/images/applicationforms/'.$FileName1)) 
                    {
                        unlink("../../../assets/images/applicationforms/".$FileName1);
                    }

                }

                $query_delete1 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete1=mysql_query($query_delete1);
                if($q_delete1)
                {
                    $hasvar="true";
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../applicationforms.php?&msg=".urlencode(base64_encode($message))); 

    }
    elseif(isset($_REQUEST['timelinedel']))
    {
        unset($_REQUEST['timelinedel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {
           if (is_numeric($variable)) 
            {  
                $table_name1 = "activities";   
                
                

                $query_delete1 = "DELETE FROM ".$table_name1." WHERE id= ".$variable."";
                $q_delete1=mysql_query($query_delete1);
                if($q_delete1)
                {
                    $hasvar="true";
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select to Delete.";
        }
        header("Location:../timeline.php?&msg=".urlencode(base64_encode($message))); 
    }
    elseif (isset($_REQUEST['gallerytypedel'])) 
    {
       
        unset($_REQUEST['gallerytypedel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {
           if (is_numeric($variable)) 
            {  
                $table_name1 = "gallery"; 
                $table_name2="gallerycategory"; 
                $table_name3="gallerysubcategory";
                $sql= "select category FROM ".$table_name2."  WHERE id= ".$variable."";
                $req=mysql_query($sql);
                if($res=mysql_fetch_array($req))
                {
                    $category=$res['category'];
                   
                }
                $sql2="select id,coverimage FROM ".$table_name3."  WHERE categoryid= ".$variable."";
                $r2=mysql_query($sql2);
                if(mysql_num_rows($r2)!=0)
                {
                    while ($rs2=mysql_fetch_array($r2)) 
                    {
                        $coverimage=$rs2['coverimage'];
                        
                        if (file_exists('../../../assets/images/gallery/'.$coverimage)) 
                        {

                            unlink('../../../assets/images/gallery/'.$coverimage);
                        }
                        
                        $file="select imagename FROM ".$table_name1."  WHERE subcategoryid= ".$rs2['id']."";
                        $fileEx=mysql_query($file);
                        while($row=mysql_fetch_array($fileEx))
                        {
                           
                            $FileName=$row['imagename'];
                           
                            if (file_exists('../../../assets/images/gallery/'.$FileName)) 
                            {

                                unlink('../../../assets/images/gallery/'.$FileName);
                            }
                        }
                       
                        $query_delete1 = "DELETE FROM ".$table_name1." WHERE subcategoryid= ".$rs2['id']."";
                        $q_delete1=mysql_query($query_delete1);

                    }
                     

                }
               
                
                
                

               
                $query_delete2 = "DELETE FROM ".$table_name3." WHERE categoryid= ".$variable."";
                $q_delete2=mysql_query($query_delete2);
                
                
                $query_delete3 = "DELETE FROM ".$table_name2." WHERE id= ".$variable."";
                $q_delete3=mysql_query($query_delete3);

                
                if($q_delete3)
                {
                    $hasvar="true";
                }

            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select item to Delete.";
        }
        header("Location:../gallery.php?&msg=".urlencode(base64_encode($message))); 
    }
    elseif (isset($_REQUEST['gallerysubtypedel'])) 
    {
        $enid=$_REQUEST['enid'];
        unset($_REQUEST['enid']);
        unset($_REQUEST['gallerysubtypedel']);
        unset($_REQUEST['example_length']);
        foreach ($_REQUEST as $variable) 
        {
           if (is_numeric($variable)) 
            {  
                $table_name1 = "gallery"; 
                $table_name2="gallerysubcategory"; 
                $sql= "select coverimage FROM ".$table_name2."  WHERE id= ".$variable."";
                $req=mysql_query($sql);
                if($res=mysql_fetch_array($req))
                {
                    $FileName=$res['coverimage'];
                    if (file_exists('../../../assets/images/gallery/'.$FileName)) 
                    {

                        unlink('../../../assets/images/gallery/'.$FileName);
                    }
                }
                $file="select imagename FROM ".$table_name1."  WHERE subcategoryid= ".$variable."";
                $fileEx=mysql_query($file);
                while($row=mysql_fetch_array($fileEx))
                {
                   
                    $FileName=$row['imagename'];
                   
                    if (file_exists('../../../assets/images/gallery/'.$FileName)) 
                    {

                        unlink('../../../assets/images/gallery/'.$FileName);
                    }
                }
                
                
                

               
                $query_delete1 = "DELETE FROM ".$table_name1." WHERE subcategoryid= ".$variable."";
                $q_delete1=mysql_query($query_delete1);
                
                
                $query_delete2 = "DELETE FROM ".$table_name2." WHERE id= ".$variable."";
                $q_delete2=mysql_query($query_delete2);
                if($q_delete2)
                {
                    $hasvar="true";
                }
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
            $message = "Successfully Deleted";

        else if (!$hasvar) 
        {
            $message= "First Select item to Delete.";
        }
        header("Location:../managegallery.php?id=".$enid."&msg=".urlencode(base64_encode($message))); 
    }
    elseif (isset($_REQUEST['aritistimagedel'])) 
    {
       $enid=$_REQUEST['enid'];
       
        unset($_REQUEST['enid']);
     
        
        unset($_REQUEST['aritistimagedel']);
        unset($_REQUEST['example_length']);
        

        $hasvar = false;
        foreach ($_REQUEST as $variable) 
        {
            if (is_numeric($variable)) 
            { 
                $hasvar = true;     
                $table_name = "artistimages";   
                $img="select imagename FROM ".$table_name." WHERE id= ".$variable."";
                $image=mysql_query($img);
                if($row=mysql_fetch_array($image))
                {
                 $pic=$row['imagename'];
                
                }
                
               if (file_exists('../../../assets/images/artists/'.$pic)) 
                {
                unlink("../../../assets/images/artists/".$pic);
                }
               
                
                $query_delete = "DELETE FROM ".$table_name." WHERE id= ".$variable."";
                $q_delete=mysql_query($query_delete);
                if (!$q_delete)
                {
                    if (mysql_errno () == 1451) //Children are dependent value
                        $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.";
                    else
                        $_GLOBALS['message'] = mysql_errno();
                }    
            }
        }
        if (!isset($_GLOBALS['message']) && $hasvar == true)
        {
            $message = "Successfully Deleted";
        }
        else 
        {
            $message = "First Select item to Delete.";
        }
         header("Location:../uploadaritistmoreimages.php?artist=".urlencode(base64_encode($enid))."&msg=".urlencode(base64_encode($message)));
    }
} 
?>