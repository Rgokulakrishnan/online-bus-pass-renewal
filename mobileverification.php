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


<form action="mobileverification.php" method="post">
</head>
<body>
<div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="80px" width="250px">
            </a>
        </div>
<p>to verify your email click on the button</p>
<button class="btn btn-primary" name="click">click</button>
<style>
				   body{
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
					
						   
					
}
	</style>

</body>
	</form>
</html>
<?php
session_start();
if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}

if(isset($_POST["click"])) 
{
	 ?>
       <form action="mobileverification.php" method="post">
<div class="container">
<center>enter verification code sent to your mail id to continue</center><br><input class="form-control" type="text" name="verifi"><br>
</br><button class="btn btn-primary" name="submit">submit</button>
</div>
</form>
        <?php
	}
if(isset($_POST["submit"])) 
{
$confi=$_POST['verifi'];
$id= $_SESSION['id'] ;
$con = mysqli_connect("localhost","root","","pass");
if (mysqli_connect_errno())
  {
  echo "failed to connect" . mysqli_connect_error();
  }
$sql="insert into verifieduser(id,verified,verificationno) values ('$id','1','$confi')";
mysqli_query($con,$sql);
echo "you are now verified";
header ("location:hme.php");
mysqli_close($con);
}
?>