<?php
include 'db.php';
include 'products.inc.php';

// Storing users and product that they added into mycart table;

session_start();
// echo "Welcome to your Cart " . $_SESSION['connected_user_name'];
$key = $_GET['value'];
 if (in_array($key, $fileList)) // avoid inserting something from url (value=<script>);
{
    $username = $_SESSION['connected_user_name'];  
    if (isset($_SESSION['connected_user_name'])) {
        $sql = "INSERT INTO myCart (user_name, product_name) VALUES ('$username', '$key')";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "mysqli_stmt_prepare : error";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
}

// Getting from myCart db the users and their products in a Good form;

if (isset($_SESSION['connected_user_name'])) {
    $sql = "SELECT * FROM myCart WHERE user_name='$username'";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "mysqli_stmt_prepare : error";
            exit();
        }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)){
    $esas[] = $row['product_name'];
    }
    // var_dump($esas);
    $_SESSION['user_product'] = $esas;
    // for
    
    
    // var_dump($_SESSION['user_product']);
}
?>