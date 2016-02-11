<?php
 include 'dbconfig.php';
  if(isset($_POST["import"]))
     {
     if($_FILES)
        {
         if ($_FILES['file']['size'] > 0) 
            { 
              $filename  = $_FILES['file']['tmp_name'];
                echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                echo "Type: " . $_FILES["file"]["type"] . "<br />";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . "     Kb<br />";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                if (file_exists("upload/" . $_FILES["file"]["name"])) 
                 {
                 echo $_FILES["file"]["name"] . " already exists. ";
                 }
                else 
                 {                          
                                                 //Store file in directory "upload" with the name of "uploaded_file.txt"
                  $storagename = "uploaded_file.txt";
                  move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
                   echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
                 }
                 
               
              $handle = fopen($filename, "r");
        
                while (($data = fgetcsv($handle,",")) !== FALSE)
                  {
                                                                                //insert into ameex_user table
                      $sql = "INSERT into ameex_user (`name`, `pass`)
                            values('$data[0]','$data[1]') ";
                 
                      $result=mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn));
                          echo json_encode($result);
                

                      $get_sql_id = "select uid from ameex_user where name='$data[0]'"; 
	 
                                                                                        //getting user uid
                      $res = mysqli_query($cn,$get_sql_id) or die("Error in getting uid from login" . mysqli_error($cn));
                      $uid=mysqli_fetch_array($res);
						//echo json_encode($uid['uid']);
                      $user_id=$uid['uid'];
                                                         //for second table ameex_user_profile details
                      $sql1="INSERT into ameex_user_profile (`uid`,`first_name`, `last_name`,`mail`,`phone`)
                            values('$user_id','$data[2]','$data[3]','$data[4]','$data[5]') ";

                      $result1=mysqli_query($cn,$sql1) or  die("Error in Selecting " . mysqli_error($cn));
                      echo json_encode($result1);			    			    
                }
                              //echo json_encode($result1);			    
             }       
        else 
        echo "no record";                        
        }
    }
?>


