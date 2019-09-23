<?php
$servername = "remotemysql.com";
$username = "nEEqfo7jll";
$password = "4Il1MJbaHH";
$dbname = "nEEqfo7jll";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>