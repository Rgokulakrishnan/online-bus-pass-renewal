<html> 
<body>
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
                <img src="logo5.jpg" alt="logo" height="80px" width="220px">
            
            </a>
        </div>
</header>
</body>
<form action="renew.php" method="post">
<h3>Account no <br> <input class="form-control col-3" type="text" placeholder="Valid Card Number"  name="accno" required></h3><br>
<h3>CVV<br><input class="form-control col-3" type="password" placeholder="cvv" name="cvv" required ></h3><br> 
<h3>Expiry Date<br> <input class="form-control col-3" type="text" placeholder="MM"  name="mon" required></h3>
<input class="form-control col-3" type="text" placeholder="YY"  name="year" required><br>
<br><button class="btn btn-primary" name=submit id=submit > Submit</button>
  <style>
					body  {
background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
   }

	</style>
</form>
</body>
</html>   

<?php
session_start();

if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}

$con = mysqli_connect("localhost","root","","pass");
if (mysqli_connect_errno())
  {
  echo "failed to connect" . mysqli_connect_error();
  }
 if($_SERVER["REQUEST_METHOD"] == "POST")
{
$id= $_SESSION['id'] ;
$date = date ( 'Y-m-j');
$newdate = strtotime ( '+30 days' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );
 $sqlqur="select * from transaction where id='$id'";
$ses=mysqli_query($con,$sqlqur);
$user="";
while($uid=mysqli_fetch_array($ses)) {
$user=$uid['id'];
}
 if($user==0 || $user==NULL) 
{
$sqlqur="insert into transaction (id,trans,rendate,exdate) values ($id,'1',now(),'$newdate')";
if(!mysqli_query($con,$sqlqur))
{
echo "error";
}
else 
{
echo "success";
header ("location:hme.php");
}
}
else
{
$sqlqur="update  transaction set trans='0',rendate=now(),exdate='$newdate'";
if(!mysqli_query($con,$sqlqur))
{
echo "eror";
}
else
{
echo "suces";
header ("location:hme.php");
}
       }
}
?>