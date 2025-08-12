<?php
// Database configuration
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "productshow";   

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the line below for debugging if needed
// echo "Connected successfully";
?>
