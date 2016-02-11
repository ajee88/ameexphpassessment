<html>

<head>
<style>
html, body, #map_canvas { margin: 0; padding: 0; height: 100% }
</style>

<?php
session_start();
require "dbconfig.php"; 
?>
<form method="post" action="">
<input type="button" value="PROFILE VIEW" onclick="window.location.href='http://localhost/map/loginm.php'" />
<table>
<tr><td>USER NAME:</td><td><input type="text" name="uname" value=""/></td></tr>
<tr><td>PASSWORD:</td><td> <input type="password" name="upass" value=""/></td></tr>
<tr><td>CONFIRM PASSWORD:</td><td> <input type="password" name="pass" value=""/></td></tr>
<tr><td>STREET NAME:</td><td><input type="text" name="add1" value=""/></td></tr>
<tr><td>ADDITIONAL ADDRESS:</td><td><input type="text" name="add2" value=""/></td></tr>
<tr><td>CITY:</td><td> <input type="text" name="ct" value=""/></td></tr>
<tr><td>PROVINCE: </td><td><input type="text" name="pro" value=""/></td></tr>
<tr><td>ZIP CODE: </td><td><input type="text" name="zip" value=""/></td></tr>
<tr><td>COUNTRY: </td><td><input type="text" name="con" value=""/></td></tr>
<tr><td>LATITUDE:</td><td><input type="text" id="lat" name="l" size="20"></td></tr>
<tr><td>LONGTITUDE: </td><td><input type="text" id="lng" name="l1" size="20"></td></tr>
<tr><td>ADDRESS OF YOUR MARK:</td><td><input type="text" id="address" name="address" size="70"></td></tr>
<tr><td><input type="submit" name="sum" value="REGISTER" /></td><td><input type="button" value="GEO CODE" onclick="window.location.href='http://localhost/map/g.php'" /></td></tr>


</table>


<?php
if(isset($_POST['sum']))
 {

$var1=$_SESSION['address']=$_POST['address'];
//$_SESSION['address']=$geo;
echo $var1;

 

 
// Check connection
  if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 

 // echo "Connected successfully";
 
  }?>
<?php 
 if(isset($_POST['sum'])) 
{

$id=uniqid();
$name= $_POST['uname'];
echo $name;
$pass= $_POST['upass'];
$conpass= $_POST['pass'];
$street= $_POST['add1'];
$addst= $_POST['add2'];
$city= $_POST['ct'];
$provin= $_POST['pro'];
$zip= $_POST['zip'];
$coun= $_POST['con'];
$lat= $_POST['l'];
$lng= $_POST['l1'];


/*echo $name."<br>";
echo $pass."<br>";
echo $conpass."<br>";
echo $street."<br>";
echo $addst."<br>";
echo $city."<br>";
echo $provin."<br>";
echo $zip."<br>";
echo $coun."<br>";
echo $lat."<br>";
echo $lng."<br>";
*/

} 
?>
<?php

$sql = "INSERT INTO ameex_user(name,pass)VALUES('$name','$pass')";
     $result=mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn));
                echo json_encode($result);
 $get_sql_id = "select uid from ameex_user where name='$name'";
  //getting user uid
                $res = mysqli_query($cn,$get_sql_id) or die("Error in getting uid from login" . mysqli_error($cn));
                $uid=mysqli_fetch_array($res);
 $user_id=$uid['uid']; 

 if($cn->query($sql) === TRUE)
 {
    //echo "Login Error" .$sql ."<br>" .$cn->error;
 }
 else
 {
echo $user_id;
echo "Login REGISTERED";
 }
$sql1="INSERT INTO ameex_user_location values('$user_id','$street','$addst','$city','$provin','$zip','$coun','$lat','$lng')";

                 $result1=mysqli_query($cn,$sql1) or  die("Error in Selecting " . mysqli_error($cn));
               echo json_encode($result1);
  $cn->close();
 }
?>
    <div id="map_canvas"></div>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBverp1H5tmi2wJCP_x3p9LV4CLRcWDqAw"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>
var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(36.835769, 10.247693 ),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location, 
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>
 

</head>
</html>
