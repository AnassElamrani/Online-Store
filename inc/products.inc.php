
<?
require 'db.php';
// print_r($_POST);

// Get list of images ;
chdir('./images/');
$fileList = glob('*');
$existed = array();


// Get stored images on db ;

$sql = "SELECT path_name FROM products";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "mysqli_stmt_prepare : error";
    exit();
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)){
    $existed[] = $row['path_name'];
}

// Delete images from db , that were deleted from the images folder;

$x = 0;
$updatedFlist = array_diff($existed, $fileList);
$updatedFlist = array_slice($updatedFlist, 0);
while ($updatedFlist[$x]) {
    $sql = "DELETE FROM products WHERE path_name='$updatedFlist[$x]' ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "mysqli_stmt_prepare : error3";
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $x++;
}

// 
// -----price token from the imgs names;

foreach($fileList as $key => $element){
    preg_match('/[0-9]+/', $fileList[$key], $match);
    $matches[$key] = intval($match[0]);
}

// ---------------------|Stock|----------------------------------;
// Exclude categories folder from upload to db;

$pos[] = array_search('Bracelet' ,$fileList);
$pos[] = array_search('Game' ,$fileList);
$pos[] = array_search('Home' ,$fileList);
$pos[] = array_search('Baby' ,$fileList);
$pos[] = array_search('Men' ,$fileList);
$pos[] = array_search('Pet Supply' ,$fileList);
$pos[] = array_search('Ring' ,$fileList);
$pos[] = array_search('Stuffed Animal' ,$fileList);
$pos[] = array_search('Women' ,$fileList);
$pos[] = array_search('Necklace' ,$fileList);

foreach($pos as $m => $element){
    unset($fileList[$pos[$m]]);
}
$fileList = array_slice($fileList, 0);
var_dump($fileList);

// Get name from path; 
foreach($fileList as $ky => $element){
    $d[$ky] = preg_replace('/[0-9]+/', '', basename($fileList[$ky]), 1);
    $d[$ky] = basename($d[$ky], '.jpg');
    $d[$ky] = basename($d[$ky], '.jpeg');
    $d[$ky] = basename($d[$ky], '.png');
}
var_dump($d);

// Stock;

$newFlist = array_diff($fileList, $existed);
$newFlist = (array_slice($newFlist, 0));
$newTf = count($newFlist);
$i = 0;
while ($i < $newTf) {
    $sql = "INSERT INTO products (path_name, price, name) VALUES ('$newFlist[$i]', '$matches[$i]', '$d[$i]')";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "mysqli_stmt_prepare : error2";
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $i++;
}
?>













































