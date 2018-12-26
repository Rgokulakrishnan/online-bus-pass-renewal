<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
    font-family: "Lato", sans-serif;
	background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
	padding: 10px;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}
	.sdnav{
		float: right;
		cursor: grab;
	}
	
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="60px" width="250px">
            </a>
        </div>
        
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="myaccount.php">My Account</a>
  <a href="getpass.php">Get pass</a>
  <a href="getpassid.php">Get id</a>
  <a href="renew.php">Renew</a>
  <a href="contact.php">Contact</a>
  <a href="logout.php">Log out</a>
<a href="Help.html">Help</a>

</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<center>
<br>

 <p style="color:#0000cc;font-size:30px;font-family:forte;">Travelling-It leaves you Speechless,</p>
<p style="color:#0000cc;font-size:30px;font-family:forte;">Then turns you into a Storyteller....</p>

<center><marquee><img src="38ffe485cc94efb3137f5796a63e046b.gif"></center></marquee>
	</center>
</body>
</html> 
<?php
session_start();
$con = mysqli_connect("localhost","root","","pass");

$id=$_SESSION['id'];
if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}
$sql="SELECT  * from verifieduser where  id = '$id'";
$result = mysqli_query($con,$sql);
$user="";
while($uid=mysqli_fetch_array($result)) {
$user=$uid['id'];
}

if($user==NULL || $user=0)
{
header ("location:mobileverification.php");
	
}

$sql1="SELECT  * from busdet where  id = '$id'";
$result1 = mysqli_query($con,$sql1);
$user1="";
while($uid=mysqli_fetch_array($result1)) {
$user1=$uid['id'];
}

if($user1==NULL || $user1=0)
{
header ("location:busdet.php");
	
}


?>