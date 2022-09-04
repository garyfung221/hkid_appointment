<?php

//connect details
$servername = "localhost";
$username = "root";
$password = "";
$database = "hkid_appointment_db";

//connect query
$conn = new mysqli("$servername","$username","$password","$database");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}


?>