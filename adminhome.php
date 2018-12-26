
<?php
?>
	<body>
<div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="40px" width="200px">
            </a>
        </div>
        
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pass";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlqur="select id from personalinfo where adminverified='0'";
$ses=mysqli_query($con,$sqlqur);
$user="" ;
while($uid=mysqli_fetch_array($ses)) {
$user=$uid['id'];
}
if($user==NULL || $user=='0')
{
echo "no account to verify";
}
else
{
$query = "SELECT * FROM busdet where id=$user";  
                $result2 = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result2))  
                {  
					$cfrom= $row['cfrom'];
$cto=$row['cto'];
$pfrom= $row['pfrom'];
$pto= $row['pto'];

                     echo '  
                            
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['profile'] ).'" height="200" width="200" class="img-thumnail" />  
                                
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['bonafied'] ).'" height="300" width="200" class="img-thumnail" />  
                            
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['adres'] ).'" height="300" width="200" class="img-thumnail" />  
                             
                     ';  
                }  
                 
                 
$sqlqur1 ="select * from personalinfo where id=$user";
$result1=mysqli_query($con,$sqlqur1);
while($rowval = mysqli_fetch_array($result1))
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
?>
<form action="adminhome.php" method="post">username <br> <input class="input" type="text" placeholder="Username" name="username" value= "<?php echo $username ?>" readonly ><br>

 dateofbirth<br><input type=date class="input" name="date" value= <?php echo $dob ?>  readonly="readonly" ><br> 

 gender<br> <input class="input" type="text"  value= <?php echo $gender ?> readonly ><br> 
 
phone no<br><input class="input" type="text" placeholder="phone no" name="phone" value= <?php echo $phone ?> readonly ><br> 

 email<br><input class="input" type="text" placeholder="mail" name="email" value= <?php echo $email ?> readonly><br> 

 address<br><input class="input" type="text" placeholder="mail" name="address" value= <?php echo $address ?> readonly><br> 

  
 city<br><input class="input" type="text" placeholder="city" name="city" value=  <?php echo $city ?> readonly ><br> 

 pin code<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $pin ?> readonly ><br> 

college studying<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $clgname ?> readonly ><br> 
  
year studying<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $yrst ?> readonly ><br> 

college location<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $clglcn ?> readonly ><br> 
from<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $cfrom ?> readonly ><br> 
to<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $cto ?> readonly ><br> 
from<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $pfrom ?> readonly ><br> 
to<br><input class="input" type="text" placeholder="pincode" name="pincode" value= <?php echo $pto ?> readonly ><br> 
<button name="verify">verify</button>

<button name="block">block</button>

     <?php
if(isset($_POST["verify"])) {
$sqlqur="update personalinfo set adminverified='1' where id=$user";
$ses=mysqli_query($con,$sqlqur);
	
}
if(isset($_POST["block"])) {
$sqlqur="update personalinfo set adminverified='2' where id=$user";
$ses=mysqli_query($con,$sqlqur);
	
}
}
mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<style>
body{
padding:10px;
    font-family: "Lato", sans-serif;
	background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
	padding: 10px;
}
</style>


<body>
<button name="view" onclick="window.location.href='alldetails.php'">all details</button>
<button name="feedback" onclick="window.location.href='feedbackview.php'">view feedback</button>
<button name="logout" onclick="window.location.href='logout.php'">logout</button>
</form>
</body>
</html>