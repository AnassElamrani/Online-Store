<?php
$servername = "mysql:3306";
$username = "root";
$password = "tiger";
$dbname = "shopyma";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}
?>