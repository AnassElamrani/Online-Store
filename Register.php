<?php
include("header.php");
$error = $_GET['error'];
?>
<div class="rform">
    <form action="./inc/Register.inc.php" method="post">
        <label for="name">Name: <sup>*</sup></label>
        <input type="text" name="name" placeholder="   Name" required>
        <?php echo (isset($_GET['error']) && $error == "empty_name") ? "$error" : "" ;?>
        <br><br>
        <label for="email">Email: <sup>*</sup></label>
        <input type="email" name="email" placeholder="   Email" required>
        <?php echo (isset($_GET['error']) && $error == "empty_password") ? "$error" : "" ;?>
        <br><br>
        <label for="password">Password: <sup>*</sup></label>
        <input type="password" name="password" placeholder="   Password" required>
        <?php echo (isset($_GET['error']) && $error == "short_password") ? "$error" : "" ;?>
        <br><br>
        <label for="password">Confirm Password: <sup>*</sup></label>
        <input type="password" name="confirm_password" placeholder="   Confirm password" required>
        <?php echo (isset($_GET['error']) && $error == "confirm_password_doesnt_match") ? "$error" : "" ;?>
        <br>
        <input id="bn" type=submit name='submit'>
    </form>
<div>
    </body>
</html>