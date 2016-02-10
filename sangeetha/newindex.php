<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Address Form</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Live Demo of Google Maps Geocoding Example with PHP</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
 
   

    body{
        font-family:arial;
        font-size:.8em;
    }
     
    input[type=text]{
        padding:0.5em;
        width:20em;
    }
     
    input[type=submit]{
        padding:0.4em;
    }
     
    #gmap_canvas{
        width:100%;
        height:30em;
    }
     
    #map-label,
    #address-examples{
        margin:1em 0;
    }
    </style>

  </head>
<?php
session_start();
require "dbconfig.php"; 
?>


<?php

if(isset($_POST['submit']))
{
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['add1']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>
 
    <!-- google map will be shown here -->
    <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div>
 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>    
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>
 <?php
 
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}
?>

  <body>
<form method="post" action="">
<center><input type="submit" name="submit" value="FIND IN MAP" class="btn btn-default"  /></center>
<button type="button" style="float: right; onclick="window.location.href='http://localhost/project/files/loginm.php'">PROFILE VIEW</button>
    <div id="locationField">
   
    </div>
<b><br>

    <table id="address">
  <tr>
        <td class="label">Name:</td>
         <td  class="wideField" colspan="3"><input class="field" id="street_number" name="uname"
              ></input></td>
      </tr>
  <tr>
        <td class="label">Password:</td>
         <td  class="wideField" colspan="3"><input type="password" class="field" id="street_number" name="upass"
              ></input></td>
      </tr>
  <tr>
        <td class="label">Confirm Password:</td>
         <td  class="wideField" colspan="3"><input type="password" class="field" id="street_number" name="pass"
              ></input></td>
      </tr>
      <tr>
        <td class="label">Street address</td>
      
        <td class="wideField" colspan="3"><input class="field" id="route" name="stadd"
              ></input></td>
      </tr>
    <tr>
        <td class="label">Additional address</td>
      
        <td class="wideField" colspan="3"><input class="field" id="route" name="stadd1"
            ></input></td>
      </tr>
      <tr>
        <td class="label">City</td>
        <td class="wideField" colspan="3"><input class="field" id="locality" name="city"
            ></input></td>
      </tr>
      <tr>
        <td class="label">Province</td>
        <td class="slimField"><input class="field" name="state"
              id="administrative_area_level_1" ></input></td>
        <td class="label">Zip code</td>
        <td class="wideField"><input class="field" id="postal_code" name="zp"
             ></input></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field" name="countr"
              id="country" ></input></td>
      </tr>
 </table>
<?php
$add = $_POST["address"];


            $prepAddr = str_replace(' ','+',$add);

            $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');

            $output= json_decode($geocode);

             $lat = $output->results[0]->geometry->location->lat;
             $long = $output->results[0]->geometry->location->lng;
?>

   <table>
<tr><td>Address to geocode: <input type="text" size="30" name="address" value="<?php if(isset($_POST['sum'])) {$stadd=$_POST['stadd'];$stadd1= $_POST['stadd1']; $city=$_POST['city']; $country=$_POST['countr']; $var= $stadd.$stadd1.$city.$country; echo $var;} ?>"/></td><td><center> <input type="submit" name="sum" value="USER REGISTER"  class="btn btn-default" />
</td></tr>
</table>
<?php


if(isset($_POST['sum']))
 {

$_SESSION['var']=$var;
//$_SESSION['address']=$geo;
echo $var1;

 

 
// Check connection
  if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 

  echo "Connected successfully";
 
  }?>
<?php 
 if(isset($_POST['sum'])) 
{

$id=uniqid();
$name= $_POST['uname'];
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
 $sql = "INSERT INTO ameex_user values(NULL,'$name','$pass')";

 if($cn->query($sql) === TRUE)
 {
  echo "Login REGISTERED";
 }
 else
 {
  echo "Login Error" .$sql ."<br>" .$cn->error;
 }
 
  $cn->close();
 }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#container").click(function(){
        $("#1").hide();
  
        
    });

</script>

  <p>
<div class="container">
<p id="1"> 
<table border="5">

<tr><td>STREET NAME:</td><td><input type="text" name="add1" value="<?php if(isset($_POST['sum'])) {echo $_POST['stadd'];} ?>"/></td></tr>
<tr><td>ADDITIONAL ADDRESS:</td><td><input type="text" name="add2" value="<?php if(isset($_POST['sum'])) {echo $_POST['stadd'];} ?>"/></td></tr>
<tr><td>CITY:</td><td> <input type="text" name="ct" value="<?php if(isset($_POST['sum'])) {echo $_POST['city'];} ?>"/></td></tr>
<tr><td>PROVINCE: </td><td><input type="text" name="pro" value="<?php if(isset($_POST['sum'])) {echo $_POST['state'];} ?>"/></td></tr>
<tr><td>ZIP CODE: </td><td><input type="text" name="zip" value="<?php if(isset($_POST['sum'])) {echo $_POST['zp'];} ?>"/></td></tr>
<tr><td>COUNTRY: </td><td><input type="text" name="con" value="<?php if(isset($_POST['sum'])) {echo $_POST['countr'];} ?>"/></td></tr>
<tr><td>LATITUDE: </td><td><input type="text" name="l" disabled="true=" value="<?php echo $lat;?>"/></td></tr>
<tr><td>LONGTITUDE: </td><td><input type="text" name="l1" disabled="true="  value="<?php echo $long;?>"/></td></tr>

   <tr><td colspan="3">
<input type="submit" name="sub" value="LOCATION REGISTER" class="btn btn-default"/></center></td></tr>
 



</table>

 
</p>
</div>
</form>
</p>
<?php

if(isset($_POST['sub']))
 {

$var1=$_SESSION['var'];


   

 
// Check connection
  if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 

  //echo "Connected successfully";
 
  }?>
<?php 
 if(isset($_POST['sub'])) 
{

$id=uniqid();
$name= $_POST['uname'];
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
 $sql = "INSERT INTO ameex_user_location values('$street','$addst','$city','$provin','$zip','$coun','$lat','$lng')";

 if($cn->query($sql) === TRUE)
 {
  echo "Location REGISTERED";
 }
 else
 {
  echo "Login Error" .$sql ."<br>" .$cn->error;
 }
 
  $cn->close();
 }
?>
<input type="text" name="add1" value="<?php echo $var1;?>"/>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBverp1H5tmi2wJCP_x3p9LV4CLRcWDqAw&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>

    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>



  </body>
</html>
