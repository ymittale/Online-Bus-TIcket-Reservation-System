<?php
session_start();
if(is_null($_SESSION['Email']))
header("location: http://localhost/Online Ticket Booking/Login.php");
$Email=$_SESSION['Email'];
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$q="SELECT * FROM bookings WHERE Email='$Email'";
$result = mysqli_query($con,$q);
$num=mysqli_num_rows($result);
$i=0;
while($row=mysqli_fetch_assoc($result))
{
    $arr[$i]['BusId']=$row['BusId'];
    $arr[$i]['_From']=$row['_From'];
    $arr[$i]['_To']=$row['_To'];
    $arr[$i]['Seat_Num']=$row['Seat_Num'];
    $arr[$i]['_Date']=$row['_Date'];
    $arr[$i]['Fare']=$row['Fare'];
    $i++;
}
date_default_timezone_set("Asia/Kolkata");
$current_date=date("Y-m-d");
$current_time=date("H:i:s");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Bus Booking</title>
	<link href="style.css" type="text/css" rel="stylesheet" />

     <script>
         function fun(x,y,z)
         {
            var f=document.getElementById(z);
            window.location.href="http://localhost/Online Ticket Booking/Cancel.php?cancel_BusId="+x+"&cancel_Seat="+y+"&cancel_Date="+f.value;
        }
    </script>
    <style type="text/css">
        .table{
            padding:200px 400px 0px 300px;
            position:relative;
            left:140px;
        }
        h2{
            position:relative;
            width:500px;

        }
          table{
            text-align: center;
            background-color: white;
           
                   }
 .btn-primary
        {
            height:100%;
            width:100%;
            background-color: #1295C9;
            color: white;
            font-family: comic sans ms;
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
    			
    			<li><a href="SignOut.php">Sign out</a></li>
    		<!-- 	<li><a href="Bus.php">Bus</a></li> -->
    		</ul>
    	</nav>
    </div>
    
    <div class="mid">
    <div class="table">
    <table id="t1" border="3px">
<?php
 if($num==0)
  {
     
        echo "<th><h2>No booking</h2></th>";
  }
  else
  {
        echo "<tr>
    <th>Busid</th>
    <th>From</th>
     <th>To</th>
     <th>Departure</th>
     <th>Arrival</th>
    <th>Date</th>
    <th>Seat No.</th>
    <th>Fare</th>
    <th>Cancel Ticket</th>
  </tr>";

   for($j=0;$j<$num;$j++)
   {
    $BusId=$arr[$j]['BusId'];
    $q="SELECT Departure , Arrival FROM buses WHERE BusId='$BusId'";
    $result=mysqli_query($con,$q);
    while($row=mysqli_fetch_assoc($result))
    {
        $Departure=$row['Departure'];
        $Arrival=$row['Arrival'];
    }

    echo "<tr>";
        echo "<td>"; 
        echo $arr[$j]['BusId'];
        echo "</td>";
        echo "<td>"; 
        echo $arr[$j]['_From'];
        echo "</td>";
        echo "<td>"; 
        echo $arr[$j]['_To'];
        echo "</td>";
        echo "<td>"; 
        echo $Departure;
        echo "</td>";
        echo "<td>"; 
        echo $Arrival;
        echo "</td>";
        echo "<td>"; 
        echo $arr[$j]['_Date'];
        echo "</td>";
        echo "<td>"; 
        echo $arr[$j]['Seat_Num'];
        echo "</td>";
        echo "<td>"; 
        echo $arr[$j]['Fare'];
        echo "</td>";
        if(($arr[$j]['_Date']>$current_date)||(($arr[$j]['_Date']==$current_date)&&($current_time<$Departure)))
        {
            $_SESSION['cancel_BusId']=$arr[$j]['BusId'];
            $_SESSION['cancel_Seat']=$arr[$j]['Seat_Num'];
            $_SESSION['cancel_Date']=$arr[$j]['_Date'];
        echo "<td>"; 
         echo "<button onclick=fun({$arr[$j]['BusId']},{$arr[$j]['Seat_Num']},this.id) value={$arr[$j]['_Date']} class='btn-primary' id={$j}>Cancel</button>";
        echo "</td>";
        }
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