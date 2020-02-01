<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $hashedpassword = hash('whirlpool', trim($_POST['password']));

    if (empty($login) || empty($password)){
        header("Location: ../Loggin.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE name=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "mysqli_stmt_prepare : error";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) 
        {
            if ($hashedpassword == $row['password'])
            {
                // $pwdCheck = password_verify($password, $row['password']);
                $pwdCheck = TRUE;
            }
            else {
                $pwdCheck = FALSE;
            }
                // var_dump($pwdCheck);
            if ($pwdCheck == false) {
                header("Location: ../Loggin.php?error=wp");
                exit();
            }
            else if ($pwdCheck == TRUE) {
                session_start();
                $_SESSION['connected_user_id'] = $row['id'];
                $_SESSION['connected_user_name'] = $row['name'];
                header("Location: ../index.php");
                exit();
            }
        }
        else {
            header("Location: ../Loggin.php?error=noUsr");
            exit();
        }
    }
}
?>