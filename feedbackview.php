<!doctype html>
<html>
<style>
table, th, td {
    border: 1px solid black;
}
body{
    font-family: "Lato", sans-serif;
	background: url('background2.jpg') no-repeat;
background-size:cover;
background-position-y: 80px;
	padding: 10px;
}
</style>
	<body>
<div class="logo">
            <a class="logo" href="#">
                <img src="logo5.jpg" alt="logo" height="60px" width="250px">
            </a>
        </div>
        
<div class="box-body table-responsive no-padding">
<table class="table table-hover">

          <?php
$con = mysqli_connect("localhost","root","","pass");
               $sqlqur="select id,ratein,comment from feedback";
$result=mysqli_query($con,$sqlqur);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Rating</th><th>Comment</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["ratein"]. " </td><td>" . $row["comment"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$con->close();
?>
</html>