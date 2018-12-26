<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<header class="s-header">

        <div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="80px" width="250px">
            </a>
        </div>
</header>


<body>
<form  action="singup.php" method="post">
<div class="logon">
<fieldset>
<legend>personalinfo</legend>

<div class="form-group row">
  <label for="username" class="col-2 col-form-label">FULL NAME</label>
  <div class="col-5">
  <input class="form-control" type="text" placeholder="Username" name="username" required> 
  </div>
</div>

<div class="form-group row">
  <label for="password" class="col-2 col-form-label">PASSWORD</label>
  <div class="col-5">  
 <input class="form-control" type="password" placeholder="Password" name="password" required >  
   </div>
</div>

<div class="form-group row">
  <label for="date" class="col-2 col-form-label">DATE</label>
  <div class="col-5">
 <input type=date class="form-control" name="date" required>  
  </div>
</div>

<div class="form-group row">
  <label for="gender" class="col-2 col-form-label">GENDER</label>
  <div class="col-5">
 <input class="form-check-label" type="radio" name="gender" value="Male" >male   <br>
<input class="form-check-label"type="radio" name="gender"  value="Female"  >female 
  </div>
</div>

 <div class="form-group row">
  <label for="phone" class="col-2 col-form-label">PHONE NO</label>
  <div class="col-5">
  <input class="form-control" type="text" placeholder="Phone no" name="phone" required>  
 </div>
</div>

<div class="form-group row">
  <label for="email" class="col-2 col-form-label">E-MAIL ID</label>
  <div class="col-5">
 <input class="form-control" type="text" placeholder="E-mail" name="email" required>  
  </div>
</div>

<div class="form-group row">
  <label for="address" class="col-2 col-form-label">ADDRESS</label>
  <div class="col-5">
 <textarea  class="form-control" placeholder="Address"  name="address" required></textarea>   

  </div>
</div> 
<div class="form-group row">
  <label for="city" class="col-2 col-form-label">CITY</label>
  <div class="col-5">
 <input class="form-control" type="text" placeholder="City" name="city" required>  

  </div>
</div>

<div class="form-group row">
  <label for="pincode" class="col-2 col-form-label">PINCODE</label>
  <div class="col-5">
 <input class="form-control" type="text" placeholder="Pincode" name="pincode" required>  
  </div>
</div>
<div class="form-group row">
  <label for="clgname" class="col-2 col-form-label">	COLLEGE NAME</label>
  <div class="col-5">
 <input class="form-control" type="text" placeholder="College Name" name="clgname" required>  
  </div>
</div>
<div class="form-group row">
  <label for="clglcn" class="col-2 col-form-label">COLLEGE LOCATION</label>
  <div class="col-5">
 <input class="form-control" type="text" placeholder="eg-saravanampatty" name="clglcn" required>  
  </div>
</div>
<div class="form-group row">
  <label for="yrstd" class="col-2 col-form-label">YEAR STUDYING</label>
  <div class="col-5">
 <input class="form-control" type="text" placeholder="1/2/3" name="yrstd" required>  
  </div>
</div>

</fieldset>
<div class="buton">
<button name=submit class="btn btn-primary" id=submit > submit </button>
</div>
</div>
</form>
<style>
					   body{
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
}

.buton{
		text-align: center;
	}
	</style>

</body>
</html>



<?php
session_start();
$con = mysqli_connect("localhost","root","","pass");
if (mysqli_connect_errno())
  {
  echo "failed to connect" . mysqli_connect_error();
  }
 if($_SERVER["REQUEST_METHOD"] == "POST")
{

$usrname=$_POST['username'];
$password=$_POST['password'];
$dob=$_POST['date'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$pin=$_POST['pincode'];
$city=$_POST['city'];
$clgname=$_POST['clgname'];
$clglcn=$_POST['clglcn'];
$yrstd=$_POST['yrstd'];
$curdate=date('YYYY/MM/DD');
$a="select * from personalinfo where email='$email' or phone='$phone'" ;
if(!$sql2 = mysqli_query($con,$a))
{
	echo "fail";
}
if(mysqli_num_rows($sql2)==0)
{
$sql="INSERT INTO personalinfo (username,password,dob,gender,address,city,pin,doc,email,phone,clgname,clglcn,yrstd)
VALUES
('$usrname','$password','$dob','$gender','$address','$city','$pin',now(),'$email','$phone','$clgname','$clglcn','$yrstd')";
if(!mysqli_query($con,$sql) )
{
	echo "error";
}
	else
	{
echo "successfully update redirecting";
$sqlqur="select id from personalinfo where email='$email'";
$ses=mysqli_query($con,$sqlqur);
$user="" ;
while($uid=mysqli_fetch_array($ses)) {
$user=$uid['id'];
}
$_SESSION["id"] = "$user";
header ("location:hme.php");
	}

}
 else
{
	 ?>
        <script>
		alert("This email id or phone no is already registered");
		</script>
        <?php

}     
}
mysqli_close($con)
?>