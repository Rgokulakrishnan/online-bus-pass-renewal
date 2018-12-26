<?php
session_start();


if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}


$id= $_SESSION['id'] ;
$con = mysqli_connect("localhost","root","","pass");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$sqlqur ="select * from personalinfo where id=$id";
$result=mysqli_query($con,$sqlqur);
while($rowval = mysqli_fetch_array($result))
 {
$id= $rowval['id'];
$username= $rowval['username'];
$gender=$rowval['gender'];
$password= $rowval['password'];
$dob= $rowval['dob'];
$phone= $rowval['phone'];
$email= $rowval['email'];
$address= $rowval['address'];
$city= $rowval['city'];
$pin= $rowval['pin'];
$clgname= $rowval['clgname'];
$clglcn= $rowval['clglcn'];
$yrst= $rowval['yrstd'];
$doc= $rowval['doc'];
}
 
mysqli_close($con);
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="70px" width="250px">
            </a>
        </div>
</head>
<body>
<from >
<table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
$con = mysqli_connect("localhost","root","","pass");
if (mysqli_connect_errno())
  {
  echo "failed to connect" . mysqli_connect_error();
  }
                $query = "SELECT profile FROM busdet where id=$id";  
                $result1 = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result1))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['profile'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  </table>
           <div class="form-group row">
  <label for="username" class="col-2 col-form-label">NAME</label>
  <div class="col-3">       
 
    <input class="form-control" type="text" placeholder="Username" name="username" value= "<?php echo $username ?>" readonly ><br></div>
</div>
<div class="form-group row">
  <label for="date" class="col-2 col-form-label">DATE</label>
  <div class="col-3">
 <input type=date class="form-control" name="date" value= <?php echo $dob ?>  readonly="readonly" ><br> </div>
</div>
<div class="form-group row">
  <label for="gender" class="col-2 col-form-label">GENDER</label>
  <div class="col-3">
<input name="gender" class="form-control" type="text"  value= <?php echo $gender ?> readonly ><br> </div>
</div>
 <div class="form-group row">
  <label for="phone" class="col-2 col-form-label">PHONE</label>
  <div class="col-3">
<input class="form-control" type="text" placeholder="phone no" name="phone" value= <?php echo $phone ?> readonly ><br> </div>
</div>
<div class="form-group row">
  <label for="email" class="col-2 col-form-label">EMAIL</label>
  <div class="col-3">
 <input class="form-control" type="text" placeholder="mail" name="email" value= <?php echo $email ?> readonly><br> </div>
</div>
<div class="form-group row">
  <label for="address" class="col-2 col-form-label">ADDRESS</label>
  <div class="col-3">
 <input class="form-control" type="text" placeholder="mail" name="address" value= <?php echo $address ?> readonly><br> </div>
</div>
<div class="form-group row">
  <label for="city" class="col-2 col-form-label">CITY</label>
  <div class="col-3">
  
 <input class="form-control" type="text" placeholder="city" name="city" value=  <?php echo $city ?> readonly ><br> </div>
</div>
<div class="form-group row">
  <label for="PINCODE" class="col-2 col-form-label">PINCODE</label>
  <div class="col-3">
 <input class="form-control" type="text" placeholder="pincode" name="pincode" value= <?php echo $pin ?> readonly ><br> </div>
</div>
<div class="form-group row">
  <label for="pincod" class="col-2 col-form-label">COLLEGE STUDYING</label>
  <div class="col-3">
<input class="form-control" type="text" placeholder="pincode" name="pincod" value= <?php echo $clgname ?> readonly ><br></div>
</div>
  <div class="form-group row">
  <label for="pinco" class="col-2 col-form-label">YEAR OF STUDYING</label>
  <div class="col-3">
<input class="form-control" type="text" placeholder="pincode" name="pinco" value= <?php echo $yrst ?> readonly ><br> </div>
</div>
<div class="form-group row">
  <label for="pinc" class="col-2 col-form-label">COLLEGE LOCATION</label>
  <div class="col-3">
<input class="form-control" type="text" placeholder="pincode" name="pinc" value= <?php echo $clglcn ?> readonly ><br> </div>
</div>

<style>
				   body{
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
					
						   
					
}
	</style>


</form>
</body>
</html>
