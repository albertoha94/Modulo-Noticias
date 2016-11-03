<?php
$servername = "localhost";
$username = "root";
$password = "";

//-- Create connection
$conn = new mysqli("localhost", "root", "");

//-- Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//-- Connect to the database.
mysqli_select_db ($conn , "db_noticias");
//echo "Connected successfully";
?>