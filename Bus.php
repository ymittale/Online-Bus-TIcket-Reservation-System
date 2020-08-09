<?php
session_start();
if(is_null($_SESSION['Email']))
header("location: http://localhost/Online Ticket Booking/Login.php");
$_From=$_POST['From'];
$_To=$_POST['To'];
$_SESSION['_Date']=$_POST['_Date'];
date_default_timezone_set("Asia/Kolkata");
$current_date=date("Y-m-d");
$current_time=date("H:i:s");
if($_POST['_Date']<$current_date)
{
     echo ("<script>
            window.alert('Date has been spend!');
            window.location.href='http://localhost/Online Ticket Booking/User.php';</script>");
}
$con = mysqli_connect("127.0.0.1:3307","root","","project");
if($current_date==$_SESSION['_Date'])
{
$q = "SELECT * FROM buses WHERE _From='$_From' && _To='$_To' && Departure>'$current_time'";
}
else
{
    $q="SELECT * FROM buses WHERE _From='$_From' && _To='$_To'";
}
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
mysqli_close($con);
$_SESSION['_From']=$_From;
$_SESSION['_To']=$_To;
$j=0;
while($row=mysqli_fetch_assoc($result))
{
    $array[$j++]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Bus Booking</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        table{
            text-align: center;
            background-color: white;
            width: 100%;
            height: 100px;
        }
        .mid{
            padding: 200px 00px 0px 400px;
        }
        .Booking{
            margin: 100px 370px 0px 0px;
           /* background-color: white;*/
            border: 2px black;
        }
        .btn-primary
        {
            height:100%;
            width:100%;
            background-color: #1295C9;
            color: white;
            font-family: comic sans ms;
        }
        h2{
            position:relative;
            top:100px;
            text-align: center;
        }
    </style>
    <script>
        function book(x)
        {
            window.location.href="http://localhost/Online Ticket Booking/Book.php?BusId="+x;
        }
    </script>
</head>
<body>
    <header>
    <div id="header">
        <div id="P1">
        <p >BookMySeat</p>
        </div>
        <nav>
            <ul>
                <li><a href="SignOut.php">Sign out</a></li>
                <li><a href="BookedSeat.php">View Bookings</a></li>
                <li><a href="Bus.php">Bus</a></li>
            </ul>
        </nav>
    </div>
 
 <div class="mid">  
 <div class="Booking">
 <table id="t1" border="2px">
 <?php 
  if($num==0)
  {
 
        echo "<h2> Bus is not available</h2>";
    
  }
  else
  {
    echo "<tr>
    <th>From</th>
    <th>To</th>
     <th>Bus Id</th>
    <th>Departure Time</th>
    <th>Arrival Time</th>
    <th>Fare</th>
  </tr>";
  for($j=0;$j<$num;$j++)
   {
    echo "<tr>";
        echo "<td>"; 
        echo $array[$j]['_From'];
        echo "</td>";
        echo "<td>"; 
        echo $array[$j]['_To'];
        echo "</td>";
        echo "<td>"; 
        echo $array[$j]['BusId'];
        echo "</td>";
        echo "<td>"; 
        echo $array[$j]['Departure'];
        echo "</td>";
        echo "<td>"; 
        echo $array[$j]['Arrival'];
        echo "</td>";
        echo "<td>"; 
        echo $array[$j]['Fare'];
        echo "</td>";
         echo "<td>"; 
        echo "<button class='btn-primary' id='{$j}' onclick=book({$array[$j]['BusId']})>Book</button>";
        echo "</td>";
    echo "</tr>";
  }
}
  ?>
</table>
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