<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $hashedpassword = hash('whirlpool', trim($_POST['password']));

    if (!isset($name) || strlen($name) == 0) {
        header('Location: ../Register.php?error=empty_name');
        exit();
    }
    else if(!isset($password) || strlen($name) == 0) {
        header('Location: ../Register.php?error=empty_password');
        exit();
    }
    else if(strlen($password) < 6) {

        header('Location: ../Register.php?error=short_password');
        exit();
    }
    else if ($password != $confirm_password) {    
        header('Location: ../Register.php?error=confirm_password_doesnt_match');
        exit();
    }
    else {
        $sql= "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header('Location: ../Loggin.php');
    } 
}
?>