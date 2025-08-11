<?php
date_default_timezone_set("Asia/Calcutta");
$servername = "localhost";
$username = "root";
$password = "";
$database = "de";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?> 
