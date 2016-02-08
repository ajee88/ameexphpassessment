<!--login page which had been included in index page in div  id ="login_div" -->
<table class ="table">
                               	<caption><CENTER>LOGIN</CENTER></caption>		
                                <table>
                                 </tr>
                                 <div class="logout" float:"right">
                                      
                                   
                                 </div>
                                </table> 

<!--server side scripting for login page-->
 <?php

if(isset($_POST['login']))
{
  $username = $_POST['user'];
      echo $username;
      $sql = "select uid from ameex_user where name='$username'";
      $result = mysqli_query($cn,$sql) or  die("Error in checking " . mysqli_error($connection));
      $json_string = json_encode($result);
      $_SESSION['id'] = $json_string;
     echo $_SESSION['id']; 
}

?>