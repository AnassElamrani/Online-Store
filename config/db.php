<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $mysqli = new mysqli("mysql:3306", "root", "tiger", "shopyma");
    $mysqli->set_charset("utf8mb4");
} catch(Exeption $e) {
    error_log($e->getMessage());
    exit('Error connecting to database'); //Should be a message a typical user could understand
  }

// Check connection

//if (mysqli_connect_err()) {
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//    exit();
//  }

?>