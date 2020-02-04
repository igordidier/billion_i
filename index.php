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
  <?php

  include("includes/header.php");
  include("includes/classes/user.php");
  include("includes/classes/post.php");

if (isset($_POST['post'])) {
  $post = new Post($con, $userLoggedIn);
  $post -> submitpost($_POST['post_text'], 'none');
  header("location: index.php");
}

  ?>




<div class="main_collum">

  <form class="post_form" action="index.php" method="post">

    <textarea name="post_text" rows="8" cols="80" placeholder="Quick word?"></textarea>
    <input type="submit" name="post" value="Post">
    <hr>

  </form>


<?php
$post = new Post($con, $userLoggedIn);
$post -> loadpostfriends();
 ?>

</div>




</div>
  </body>
</html>
