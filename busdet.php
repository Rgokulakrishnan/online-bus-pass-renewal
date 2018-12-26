<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<form action="busdet.php" method="post" enctype="multipart/form-data">
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<style>


#output_image
{
 width:300px;
}
</style>

</head>
<body>
<header class="s-header">

        <div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="80px" width="250px">
            </a>
        </div>
</header>

<div id="wrapper">
 profile image<input type="file" class="form-control" accept="image/*" onchange="preview_image(event)" name="propic"/ required>
 <img id="output_image"/></br>

</div></br><div class="form-group row">
  <label for="from" class="col-2 col-form-label">FROM</label>
  <div class="col-4">
  <input class="form-control" type="text" placeholder="" name="from" required> 
  </div>
</div>

<div class="form-group row">
  <label for="to" class="col-2 col-form-label">TO</label>
  <div class="col-4">
  <input class="form-control" type="text"  name="to" required> 
  </div>
</div>

<div class="form-group row">
  <label for="cfrom" class="col-2 col-form-label">FROM</label>
  <div class="col-4">
  <input class="form-control" type="text" name="cfrom" required> 
  </div>
</div>

<div class="form-group row">
  <label for="cto" class="col-2 col-form-label">TO</label>
  <div class="col-4">
  <input class="form-control" type="text" name="cto" required> 
  </div>
</div>
bonafied</br><input type="file" class="form-control" accept="image/*" name="bonafied" required/></br>
address proof</br><input class="form-control" type="file" accept="image/*"  name="address" required/></br>
<button class="btn btn-primary" name="submit">submit</button>
<style>
				   body{
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
					
						   
					
}
</style>
</form>
</body>

<?php
session_start();
if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}


function getDistance($addressFrom, $addressTo, $unit){
    //Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
    $outputTo = json_decode($geocodeTo);
    
    //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344).' km';
    } else if ($unit == "N") {
        return ($miles * 0.8684).' nm';
    } else {
        return $miles.' mi';
    }
}

$id= $_SESSION['id'] ;;
if(isset($_POST["submit"])) {
$pfrom=$_POST['from'];
$pto=$_POST['to'];
$cfrom=$_POST['cfrom'];
$cto=$_POST['cto'];
$check = getimagesize($_FILES["propic"]["tmp_name"]);
$check1 = getimagesize($_FILES["bonafied"]["tmp_name"]);
$check2 = getimagesize($_FILES["address"]["tmp_name"]);
$rate=20;
$frate=20*$rate;
if($check & $check1 & $check2 !== false)
{
$image = $_FILES['propic']['tmp_name'];
$bona = $_FILES['bonafied']['tmp_name'];
$addres = $_FILES['address']['tmp_name'];  
$imgContent = addslashes(file_get_contents($image));
$imgContent1 = addslashes(file_get_contents($bona));
$imgContent2 = addslashes(file_get_contents($addres));

$con = mysqli_connect("localhost","root","","pass");
if (mysqli_connect_errno())
  {
  echo "failed to connect" . mysqli_connect_error();
  }
 $sql=" INSERT into busdet(id,pfrom,pto,cfrom,cto,profile,bonafied,adres,rate1) VALUES 
('$id', '$pfrom', '$pto', '$cfrom', '$cto','$imgContent','$imgContent1','$imgContent2','$frate')";
if(!mysqli_query($con,$sql))
{
            echo "File  not uploaded successfully.";
}
else
{
            echo "File uploaded.";

header ("location:hme.php");                     

         }
} 
else {
echo "please select image to upload";
}
}
?>
