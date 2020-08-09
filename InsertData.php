<?php
session_start();
$Seat=$_GET['x'];
$BusId=$_GET['y'];
$Date=$_SESSION['_Date'];
$Email=$_SESSION['Email'];
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$q1="SELECT Fare FROM buses WHERE BusId='$BusId'";
$result1=mysqli_query($con,$q1);
$row=mysqli_fetch_assoc($result1);
$q2="INSERT INTO seat (BusId,Seat_Booked,_Date) values ('$BusId','$Seat','$Date')";
$result2=mysqli_query($con,$q2);
$Name=$_SESSION['Name'];
$_From=$_SESSION['_From'];
$_To=$_SESSION['_To'];
$Fare=$row['Fare'];
$q3="INSERT INTO bookings (Name,Email,BusId,_From,_To,Seat_Num,_Date,Fare) values ('$Name','$Email','$BusId','$_From','$_To','$Seat','$Date','$Fare')";
$result3=mysqli_query($con,$q3);
mysqli_close($con);

?>