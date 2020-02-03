<?php
include('header.php');
include('categories.php');
include('./inc/db.php');

$folder = $_GET['value'];
// var_dump(explode(' ', $folder));
chdir('./images/'.$folder);
$lsFile = glob('*');
//var_dump($lsFile);

$sql = "SELECT * from products WHERE path_name LIKE ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$one = '%'.$folder.'%';
//var_dump($one);
$two = '%'.$folder[1].'%';
//var_dump($bnd);
mysqli_stmt_bind_param($stmt, "s", $one);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)){
    $da[] = $row['path_name'];
    $dinero[] = $row['price'];
    $name[] = $row['name'];
}
//var_dump($da);
//var_dump($dinero);
//var_dump($lsFile);
basename('/etc/sud.jpg', '.jpg');
basename('/etc/sud.jpg', '.jpeg');
basename('/etc/sud.jpg', '.png');
$x = 0;
echo "<div class='holder'>";
while ($lsFile[$x]){
    echo 
    "<div class='item'>
    <img src='./images/./".$lsFile[$x]."'>
    <div class='np'>
    <p class='name'>".$name[$x]."</p>
    <p>".$dinero[$x++]."DH</p>
    <form class='atocart' method='post'>
    <input type='submit' name='ha' value='Add to cart'>
    <input type='hidden' name='jsp' value='"."$name[$x]"."'>
    </form>
    </a>
    </div>
    </div>";
}
echo "</div>";
var_dump($_POST);
?>