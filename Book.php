<?php 
session_start();
if(is_null($_SESSION['Email']))
header("location: http://localhost/Online Ticket Booking/Login.php");
$BusId=$_GET['BusId'];
$Date=$_SESSION['_Date'];
$_SESSION['BusId']=$BusId;
$con = mysqli_connect("127.0.0.1:3307","root","","project");
$q="SELECT Seat_Booked FROM seat WHERE BusId='$BusId' AND _Date='$Date'";
$result=mysqli_query($con,$q);

$i=0;
$x=array();
while($row=mysqli_fetch_assoc($result))
{
	$x[$i++]=$row['Seat_Booked'];
}

function isbooked($seat,$allseat)
{
foreach ($allseat as $y)
{
	if($y==$seat)
		 return 1;
}
	return 0;
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Bus Booking</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<script>
		function fun(y)
{

var x=document.getElementById(y);
BusId=<?php echo $BusId; ?>;
if(x.style.backgroundColor=="blue"||x.style.backgroundColor=="orange")
{
	alert("already book");
}
else
{
x.style.backgroundColor="orange";
var req=new XMLHttpRequest();
req.open("GET","http://localhost/Online Ticket Booking/InsertData.php?x="+x.value+"&y="+BusId,false);
req.send();
}

}

	</script>
    <style type="text/css">
    .mid{
        padding:200px;
    }
    .seats{
        padding:0px 0px 0px 200px;
        background-color: white;
        width:800px;
        height:100%;
        

    }
    .button {
        width:100px;
        height:75px;
        
        
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
                <li><a href="BookedSeat.php">View Bookings</a></li>
    			<li><a href="Bus.php">Bus</a></li>
    		</ul>
    	</nav>
    </div>
 
   <div class="mid">
    <div class="seats">
   <?php           // seat printing in the seat chart
	$t=0;
	for($j=0;$j<4;$j++)
	{
		
		if($j!=2)
	    {
	    	$t++;
	        $i=$t;
            if($j==3)
                $i=17;

        for($k=0;$k<8;$k++)
         {
     	  
     	   if(isbooked($i,$x))
     	   {
                echo "<button onclick=fun(this.id,{$i}) class='button' style='background-color:blue;' value={$i} id={$i}>";
            }
            else
            {
            	 echo "<button onclick=fun(this.id,{$i}) class='button' value={$i} id={$i}>";
            }
     	   echo $i;
     	   if($j<2)
     	   $i=$i+2;
           else
           	{$i++;}
             echo "</button>";
         } 
         echo "<br>";
        }
       
        else
        {
         echo "<br><br><br><br><br>";
        }

    }
   ?>

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