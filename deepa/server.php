<?php

require "../dbconfig.php";

   

    $sql=("select ameex_user.uid,ameex_user.name,ameex_user_profile.first_name,ameex_user_profile.last_name,ameex_user_profile.mail,ameex_user_profile.phone from ameex_user_profile RIGHT JOIN ameex_user ON ameex_user_profile.uid");
    $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn)); 

     $emparray = array();

    while($row =mysqli_fetch_array($result))
    {
        $emparray[] = $row;

    }
      
      echo json_encode($emparray);

 
  
?>
  



    
    

            


     

 
