<div>
  <html>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <body>
  <style>
body{
    font-family: "Lato", sans-serif;
	background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 90px;
	padding: 10px;
}
	  </style>
<div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="60px" width="250px">
            </a>
        </div>

  <form action="contact.php" method="post">
  <br>
  <br>
  <br>
  <br>
  <h5>Feedback<h5><br>
  <p> Please provide your feedback below:</p><br>
  <p>How do you rate your overall experience?</p><br>
  
   BAD<input class="form-control col-2" type="radio" name="experience" value="bad"><br>
  Average<input class="form-control col-2" type="radio" name="experience" value="average"><br>
   GOOD<input class="form-control col-2" type="radio" name="experience" value="good"><br>
    YOUR NAME<input  class="form-control col-5" type="text" name="name"><br>
  YOUR MAIL<input type="text" class="form-control col-5" name="email"> <br>
    
  COMMENT <textarea class="form-control col-5" row=4 col=3  name="comment"></textarea><br>
  <button class="btn btn-primary">submit</button><br>
  <p> if you have any queries or complaints contact us on mail or to our customer care</p><br>
  <h6>phone:9876543210</h6><br>
  <h6>mail:mail@mail.com</h6><br>
  </body>
  </html>
</div>

<?php
session_start();
if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$rate=$_POST['experience'];
$comment=$_POST['comment'];
$name=$_POST['name'];
$email=$_POST['email'];
$id= $_SESSION['id'] ;
$con = mysqli_connect("localhost","root","","pass");
if (mysqli_connect_errno())
  {
  echo "failed to connect" . mysqli_connect_error();
  }
$sql="insert into feedback(ratein,comment,byname,email) values ('$rate','$comment','$name','$email')";
mysqli_query($con,$sql);

if(!mysqli_query($con,$sql))
{
die('error: ' . mysqli_error($con));
}
else
{
echo "sucessfully sent";
header("Location:hme.php");
}
mysqli_close($con);
}

?>