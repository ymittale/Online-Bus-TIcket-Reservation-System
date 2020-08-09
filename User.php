<?php
#load new data in database
session_start();
if(is_null($_SESSION['Email']))
header("location: http://localhost/Online Ticket Booking/Login.php");
date_default_timezone_set("Asia/Kolkata");
$current_date=date("d-m-Y");
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$q = "DELETE FROM seat WHERE Booking_Date<'$current_date'";
$result = mysqli_query($con,$q);
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Bus Booking</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
    <style>
        form{
     border: 1px solid black;
     width:370px;
     height:420px;
     background-color: rgb(247, 247, 247);
     margin-left: 500px;
     margin-right: 500px;
     padding: 0px 20px 20px 20px;
     font-family: comic sans ms;
     font-size: 20px;
     font-weight: 500;
     box-sizing: border-box;
}
.Form{
    padding-top: 100px;
}
select{
    width: 100%;
    height: 35px;
}
input{
    height:30px;
    width: 53%;
}
:: placeholder
{
   font-size: 30px;
   color:red;
}
.btn-primary{
    width: 100%;
    height: 32px;
    background-color: #1295C9;
    border-radius: 6px;
    cursor: pointer;
    color: white;
    font-family: comic sans ms;
    font-weight: bolder ;
    font-size: 16px;
}
span{
    color: blue;
}
.calendar label{
    padding-right: 20px;
     
}
    </style>
</head>
<body>
	<header>
    <div id="header">
    	<div id="P1">
    	<p >BookMySeat</p>
        </div>
    	<nav>
    		<ul>
    			
    			<li><a href="SignOut.php">Sign Out</a></li>
                <li><a href="BookedSeat.php">View Bookings</a></li>
    			<li><a href="Bus.php">Bus</a></li>
    		</ul>
    	</nav>
    </div>
   
         <div class="mid">
       
       <div>
       <div class="Form">
         <form action="Bus.php" method="post">
           <center>
           <h1>Book Your Bus</h1>
           </center>
           <div class="From">
                <label for="From">From</label><br>
                <Select  name="From" placeholder="From" required><br><br> 
                    <option disabled="disabled" selected>Select</option>
                    <option>Jaipur</option>
                    <option>Ajmer</option>
                    <option>Jhalawar</option>
                    <option>Kota</option>
                </Select><br><br>
            </div>
            <div class="To">
                <label for="To">To</label><br>
                <Select name="To" placeholder="To" required><br><br>
                    <option disabled="disabled" selected>Select</option>
                    <option>Jaipur</option>
                    <option>Ajmer</option>
                    <option>Jhalawar</option>
                    <option>Kota</option>
                </Select><br><br>
            </div>
            <div class="calendar">
                <label>Onward Date</label>
                <input type="date" name="_Date" required><br><br>
           </div>
           <div class="Book">
              <button  class="btn btn-primary" type="submit">Book</button>
           </div>
         </form>
       </div>
       </div>
       
    

    </div>

    <div id="footer">
    <footer>
        <div class="foot">
        <div class="Left same">
            <ul>
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Offers</a></li>
            </ul>
        </div>
        <div class="Right same">
            <ul>
                <li><a href=""> T&C</a></li>
                <li><a href=""> Privacy Policy</a></li>
                <li><a href=""> FAQ</a></li>
            </ul>
        </div>
        <div class="info same">
            <p id="p2">BookMySeat is the world's largest online ticket booking service trusted by over 8 million happy customers globally. BookMySeat offers bus ticket and cab booking through its website for all major routes.</p>
        </div>
        </div>
    </footer>
    </div>
</body>
</html>