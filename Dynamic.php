<?php
include 'index.php';
include './inc/db.php';
// var_dump($_SERVER['REQUEST_URI']);
$folder = explode('/', $_SERVER['REQUEST_URI']);
// var_dump($folder[2]);
chdir('./images/Stuffed Animals');
$lsFile = glob('*');
$x = 0;
echo "<div class='holder'>";
while ($lsFile[$x++]){
    echo 
    "<div class='item'>
    <img src='./images/Stuffed Animals/10Wolf Stuffed Animal.jpg'>
    <div class='np'>
    <p class='name'>Wolf Stuffed Animal</p>
    <p>60$</p>
    <a class='atocart' 
    href='http://localhost/Rush/Games_Puzzles.php?value=Wolf Stuffed Animal'>
    Add to cart
    </a>
    </div>
    </div>";
}
echo "</div>";
?>