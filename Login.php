<!DOCTYPE html>
<html>
<head>

<title></title>
<style type="text/css">

body{
	margin: 0px;
	padding: 0px;
	font-family: comic sans ms;
	color:black;
	background-color: lightgrey;
}	

 #header{
     border: 1px solid grey;
	 height:60px;
	 background-color: #FA0740 ;
	 position: fixed;
	 width: 100%;
	 z-index: 10;
	 top: 0px;
}

 #P1{
	 float:left;
	 padding-left: 20px;
	 padding-bottom: 40px;
	 font-family: comic sans ms; 
	 font-size: 25px;
	 color:white;

} 


#footer{
	background-color: black;
	height: 300px;
	width:100%;
	position:relative;
	top:500px;
    z-index: 6;
    color: white;
    font-family: lato;
    font-weight: lighter;

   }
 
#left{
	float: left;
	padding-left: 150px;
	padding-top: 50px;
    
}
#Right{
	float: right;
	padding-top: 50px;
	padding-right: 800px;

}
#info{
	float: right;
	width: 340px;
	height: 300 px;
	margin-right: 220px;
	position: relative;
	bottom: 125px;
	word-spacing: 2px;
	line-height: 20px;
	text-align: justify;

}
nav li{
	list-style-type: none;
	float:right;
	padding: 0px;
	margin: 0px;

}
li a{
	display:block;
	text-decoration: none;
	padding-bottom: 10px;
	padding-right: 50px;
	color:white;
}
 form{
	 border: 1px solid black;
	 margin-top: 100px;
	 width:350px;
	 height:380px;
	 background-color: rgb(247, 247, 247);
	 margin-left: 500px;
	 margin-right: 500px;
	 padding: 10px 20px 20px 20px;
	 font-family: comic sans ms;
     font-size: 16px;
     font-weight: 500;
     box-sizing: border-box;


}
input{
	width: 100%;
	height: 25px;
}
.btn-primary{
    width: 100%;
    height: 32px;
    background-color: #1295C9;
    border-radius: 6px;
    touch-action: manipulation;
     cursor: pointer;
     color: white;
    font-family: comic sans ms;
    font-weight: bolder ;
    font-size: 16px;
}
span{
   color: blue;
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
    			    <li><a href="Signup.php">Sign up</a></li>
    			    <li><a href="index.html">Home</a></li>
    		    </ul>
    	    </nav>
           </div>
  
     </header>


    <div class="mid">
       
       <div>
       <div class="Form">
       	 <form action="validation.php" method="post">
       	   <center>
       	   <h1>Sign In</h1>
       	   </center>
       	   <div class="Email">
       	   	    <label for="Email">Email</label><br>
                <input type="text" name="Email" placeholder="Email" required><br><br>
           </div>
           <div class="Privacy">
           	    <label for="Privacy">Password</label><br>
                <input type="password" name="Password" placeholder="Password" required><br><br>
           </div>
           <div class="Signup">
           	  <button  class="btn btn-primary" type="submit">SIGN IN</button>
           </div>
           <div>
            
            <center><p>New to BookMySeat? <a href="Signup.php">Register</a> </p></center>
           </div>
       	 </form>
       </div>
       </div>
       
    

    </div>


     <div id="footer">
     <footer>
    	<div class="foot"> 
    	<div id="Left">
    	    <ul>
    		    <li><a href=""> About us</a></li>
    		    <li><a href="">Contact us</a></li>
    		    <li><a href="">Offers</a></li>
    	    </ul>
        </div>
        <div id="Right">
    	    <ul>
    		    <li><a href=""> T&C</a></li>
    		    <li><a href=""> Privacy Policy</a></li>
    		    <li><a href=""> FAQ</a></li>
    	    </ul>
    	</div>
    	<div id="info">
    		<p id="p2">BookMySeat is the world's largest online ticket booking service trusted by over 8 million happy customers globally. BookMySeat offers bus ticket and cab booking through its website for all major routes.</p>
        </div>
         </div> 
     </footer>
     </div>

</body>
</html>