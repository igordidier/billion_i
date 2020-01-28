<?php

require 'config/config.php';
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: register.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: register.php");
  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Billi</title>
    <?php include "includes/boot.html"; ?>
    <link rel="stylesheet" href="assets/css/index.css">
  </head>
  <body>
    <?php include("includes/header.php") ?>
<?php if (isset($_SESSION['success'])){
echo "You Have Created an account Correctly! welcome $_SESSION[reg_username]!";
} ?>
<div class="user_details colume">

<a href="#">
  <img src="<?php echo $user['profile_pic'] ?>" alt="Profile Picture">
 </a>

</div>

</div>
  </body>
</html>
