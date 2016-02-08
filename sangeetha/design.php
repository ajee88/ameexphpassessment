<html>
<head>

<style>
<link rel="stylesheet" type="text/css" href="theme.css">
#welc{
     color: red;
     font-size: 30;
     text-align: center;
     font-style: italic;
     
   
}
#col{
    color:green;
    font-size:15;
    
}
#marq{       color: red;
             font-size: 20;
             font-style: italic;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

#footer {
    background-color:black;
    color:red;
    clear:both;
    text-align:center;
    padding:5px;	 	 
}
#section {
    width:400px;
    float:left;
    padding:10px;	 	 
}
#auth{
     width:250px;
     float:left;
     padding:70px;
     font-size:16px;
     color:red;
}
.head{
      hight:200px;
      align:center;
     }

#section2 {
    width:400px;
    float:right;
    padding:10px 0px;	 	 
}


.clearfix:after {
    display:block;
    clear:both;
}
 
.menu-wrap {
    width:100%;
    background:#3e3436;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    
}
 

 
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:160%;
    padding:5px 0px;
    left:0px;

}
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}


</style>


 <?php 
session_start();
  if($_SESSION['id']==0)
{ ?>

	<div class="menu-wrap">
			<nav class="menu">
				<ul class="clearfix">
					<li><a href="index.php">Home</a></li>

					<li><a href="reg.php">Register</a></li>
	                             
						
					<li><a href="loginm.php">Login</a></li>
					<li><a href="locaddr.php">Locate</a></li>
				
					
				</ul>
			</nav>
		</div>
<?php } 
else 
{
?>
<div class="menu-wrap">
			<nav class="menu">
				<ul class="clearfix">
					<li><a href="index.php" display none>Home</a></li>

                                         
					<li><a href="reg.php">Register</a></li>
					
					<li><a href="loginm.php">Login</a></li>
                                          <li><a href="locaddr.php">Locate</a></li>
				        
					
		                      
	                            
					
					
				</ul>
			</nav>
		</div>


<?php 
}
?>




<center> 
</html>

