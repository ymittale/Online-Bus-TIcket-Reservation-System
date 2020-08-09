<?php
session_start();
session_destroy();
header("location: http://localhost/Online Ticket Booking/index.html");
?>