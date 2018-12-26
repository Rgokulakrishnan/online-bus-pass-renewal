<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>
<header class="s-header">

        <div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="80px" width="250px">
            </a>
        </div>
</header>
<body>
<form  action="adminlogin.php" method="post">


<div class="wrapper">
<div class="form-group row">
  <label for="username" class="col-2 col-form-label">E-MAIL</label>
  <div class="col-4">
  <input class="form-control" type="text" placeholder="Username" name="username" required> 
  </div>
</div>

<div class="form-group row">
  <label for="password" class="col-2 col-form-label">PASSWORD</label>
  <div class="col-4">  
 <input class="form-control" type="password" placeholder="Password" name="password" required >  
   </div>
</div>

<button name=submit class="btn btn-primary" id=submit > submit </button>
</div>
				   <style>
					   body{
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
}

.wrapper{
text-alignment:centre;
padding-top:15%;
padding-left:25%;
	}
	</style>
</body>
</html>
<?php
session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email = $_POST["username"];
$pass = $_POST["password"];
$con = mysqli_connect("localhost","root","","pass");
if(! $con)
{
    die('Connection Failed'.mysql_error());
}
$sql="SELECT  id,loginid,password FROM admin WHERE loginid = '$email'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if(!$row)
{
printf("error:%s\m",mysqli_error($con));
exit();
}
$user=" ";
if($row["loginid"]==$email && $row["password"]==$pass)
{   
 $user=$row["id"];
   
header ("location:adminhome.php");

echo"You are a validated user.";
echo "$user";
}
else {

     ?>
        <script>
		alert("username or password is in correct");
		</script>
        <?php
}
$_SESSION["id"] = "$user";
}
?>