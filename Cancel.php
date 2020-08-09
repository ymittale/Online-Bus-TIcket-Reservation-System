<?php
session_start();
if(is_null($_SESSION['Email']))
header("location: http://localhost/Online Ticket Booking/Login.php");
$cancel_BusId=$_GET['cancel_BusId'];
$cancel_Seat=$_GET['cancel_Seat'];
$cancel_Date=$_GET['cancel_Date'];
$Email=$_SESSION['Email'];
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$q1="DELETE FROM bookings WHERE Email='$Email' AND BusId='$cancel_BusId' AND Seat_Num='$cancel_Seat' AND _Date='$cancel_Date'";
$result = mysqli_query($con,$q1);
$q2 = "DELETE FROM seat WHERE BusId='$cancel_BusId' AND Seat_Booked='$cancel_Seat' AND _Date='$cancel_Date'";
$result=mysqli_query($con,$q2);
mysqli_close($con);
header('location: http://localhost/Online Ticket Booking/BookedSeat.php');
?>