<?php 
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$space = " "; 
$Name = $First_Name.$space.$Last_Name ;
$insert = "INSERT INTO user (Email,Password,Name) VALUES ('$Email','$Password','$Name')";
$result = mysqli_query($con,$insert);
mysqli_close($con);
if($result)
{
	header('location: http://localhost/Online Ticket Booking/Login.php');
}
else
{
	echo ("<script>
		   window.alert('You have already registered!');
		   window.location.href='http://localhost/Online Ticket Booking/Login.php';</script>");
}
?> 