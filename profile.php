<?php

require 'config/config.php';
// if (!isset($_SESSION['username'])) {
//   	$_SESSION['msg'] = "You must log in first";
//   	header('location: register.php');
//   }
//   if (isset($_GET['logout'])) {
//   	session_destroy();
//   	unset($_SESSION['username']);
//   	header("location: register.php");
//   }
if (isset($_GET['profile_username'])) {
  $username = $_GET['profile_username'];
  $user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username ='$username'  " );
  $user_array = mysqli_fetch_array($user_details_query);

  $num_followers = (substr_count($user_array['followers'], ",")) -1;
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

    <div class="profile_left">
      <span style="text-align: center;"><?php echo $username; ?></span>
      <br>

        <img class="profile_pic_profile" src="<?php echo $user_array['profile_pic']; ?>" alt="profil picture">


            <div class="profil_info">

<ul class="profil_stat">
  <li>Post: <?php echo $user_array['num_posts']; ?> </li>
  <li>Followers: <?php echo $num_followers; ?></li>
</ul>

            </div>

    </div>




</div>
  </body>
</html>
