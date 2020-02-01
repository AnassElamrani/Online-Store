<?php
include("header.php");
$error = $_GET['error'];
?>
<div class="lform">
<form action="./inc/Loggin.inc.php" method="post">
<label for="login">Name: <sup>*</sup></label>
<input type="text" name="login" placeholder="   Name" required>
<?php echo ($error == "noUsr") ? "name does not exist" : "" ?>
<br><br>
<label for="password">Password: <sup>*</sup></label>
<input type="password" name="password" placeholder="   Password" required>
<?php echo ($error == "wp") ? "Wrong Password" : "" ?>
<br>
<input id="bn" type=submit value="Register">
</form>
<div>