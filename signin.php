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
<div class="wrapper">
<div class="image">
</br>
<img src="user.png" height="150px" width="150">
	
</div>
<form  action="signin.php" method="post">



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
</div>
<div class="btndiv">
<button name=submit class="btn btn-primary" id=submit > submit </button>
</div>
			   
				   <style>
					   body{
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
					
						   
					
}
					   .image{
						    padding-right: 40%;
					   }	   
					   .btndiv{
						   
						   padding-left: 45%;
						   
					   }
.wrapper{

	text-align: center;
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
$sql="SELECT  id,email,password FROM personalinfo WHERE email = '$email'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if(!$row)
{
printf("INCORRECT E-MAIL ID or PASSWORD",mysqli_error($con));
exit();
}
$user=" ";
if($row["email"]==$email && $row["password"]==$pass)
{   
 $user=$row["id"];
   
header ("location:hme.php");

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