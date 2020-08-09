<?php
session_start();
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$q1="SELECT Name FROM user WHERE Email='$Email'";
$result1=mysqli_query($con,$q1);
$row=mysqli_fetch_assoc($result1);
$Name=$row['Name'];
$q = "SELECT * FROM user WHERE Name='$Name' && Email='$Email' && binary Password='$Password'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
mysqli_close($con);
echo $num;
if($num==1)
{
	$_SESSION['Name']=$Name;
	$_SESSION['Email']=$Email;
	$_SESSION['Password']=$Password;
 header('location: http://localhost/Online Ticket Booking/User.php');
}
else
{
	echo ("<script>
           window.alert('Your email or password is wrong');
    	   window.location.href='http://localhost/Online Ticket Booking/Signup.php';</script>");

}
?>