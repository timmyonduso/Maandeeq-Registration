<?php
//time zone
date_default_timezone_set('Asia/Kolkata');
//database connection
$con=mysqli_connect("localhost","chaspoti_ondizi","lahmbalolo@ondizi123","chaspoti_preschooldb",3306);
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
