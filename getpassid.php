<?php
session_start();
if(!isset($_SESSION["id"])) 
{
header ("location:signin.php");
}

$id= $_SESSION['id'] ;
$dat=date("d/m/Y");
$con = mysqli_connect("localhost","root","","pass");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$sqlqur1="select adminverified from personalinfo where id='$id'";
$ses=mysqli_query($con,$sqlqur1);
$user="" ;
while($uid=mysqli_fetch_array($ses)) {
$user=$uid['adminverified'];
}
$sqlqur2="select trans,exdate from transaction where id='$id'";
$ses1=mysqli_query($con,$sqlqur2);
$user1="" ;
$exdate="";

while($uid=mysqli_fetch_array($ses1)) {
$user1=$uid['trans'];
$exdate=$uid['exdate'];
}
if($user=='0' || $user==NULL)
{

	 ?>
        <script>
		alert("please wait till admin verifies");
		</script>
       <?php
header ("location:hme.php");
}
elseif($user1=='0' || $user1==NULL)
{

	 ?>
        <script>
		alert("please pay your pass registration amount and come back later");
		</script>
        <?php
header( "refresh:5;url=hme.php" );
}
elseif($exdate > $dat)
{

	 ?>
        <script>
		alert("your are expiried please pay your amount to get pass");
		</script>
        <?php
header( "refresh:5;url=hme.php" );
}
else
{
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
$sqlqur1 ="select * from busdet where id=$id";
$result1=mysqli_query($con,$sqlqur1);
while($rowval1 = mysqli_fetch_array($result1))
 {
$cfrom= $rowval1['cfrom'];
$cto= $rowval1['cto'];
$pfrom= $rowval1['pfrom'];
$pto= $rowval1['pto'];
}
require('fpdf17/fpdf.php');
    // Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');

}
//call the FPDF library


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//output the result
$pdf->Image('logo5.jpg',10,6,30);
    $pdf->SetY(35);

$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'bus pass renewal system',0,0);
$pdf->Cell(59 ,5,$username,0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5, $cfrom,0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5, $cto,0,0);
$pdf->Cell(25 ,5,"DATE",0,0);
$pdf->Cell(34 ,5,$dat,0,1);//end of line

$pdf->Cell(130 ,5, $pfrom,0,0);
$pdf->Cell(25 ,5,'application id',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5, $pto,0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'college details',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$clgname,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$yrst,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[99997]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$clglcn,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Output();
}
?>