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
    include("assets/js/jquery.js");

    
    if(isset($_POST['remove_friend'])){
      $user = new USER($con, $userLoggedIn);
      $user->removefriend($username);
    }

    if(isset($_POST['add_friend'])){
      $user = new USER($con, $userLoggedIn);
      $user->follow($username);
    }
    $num_followers = (substr_count($user_array['followers'], ",")) -1;


    ?>

    <div class="profile_left">
      <span style="text-align: center;"><?php echo $username; ?></span>
      <br>

        <img class="profile_pic_profile" src="<?php echo $user_array['profile_pic']; ?>" alt="profil picture">


            <div class="profil_info">

              <form class="follow_form" action="<?php echo $username; ?>" method="post">
                <?php
                			$profile_user_obj = new User($con, $username);
                			// If user is closed status go to user_closed page
                			if($profile_user_obj->isClosed()){
                				header("Location: user_closed.php");
                			}

                			$logged_in_user_obj = new User($con, $userLoggedIn);

                			if($userLoggedIn != $username){ // if logged user is not same with username

                				if($logged_in_user_obj->isFollowing($username)){ // if logged user is friend of target user
                					echo '<input type="submit" name="remove_friend" class="follow_btn" value="Unfollow"><br/>';
                				}

                				// else if($logged_in_user_obj->didReceiveRequest($username)){
                				// 	echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br/>';
                				// }
                        //
                				// else if($logged_in_user_obj->didSendRequest($username)){
                				// 	echo '<input type="submit" name="" class="default" value="Request Sent"><br/>';
                				// }

                				else{
                					echo '<input class="follow_btn" type="submit" name="add_friend"  value="follow"><br/>';
                				}

                			} else {
                        echo '<input class="follow_btn" type="submit" name="edit"  value="Edit profile"><br/>';
                      }
                			?>
                		</form>


<ul class="profil_stat">
  <li>Post: <?php echo $user_array['num_posts']; ?> </li>
  <li>Followers: <?php echo $num_followers; ?></li>
</ul>
            </div>


    </div>




</div>
  </body>
</html>
