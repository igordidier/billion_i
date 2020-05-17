
<?php



require 'config/config.php';
include("includes/classes/user.php");
include("includes/classes/post.php");
include("includes/classes/Message.php");
include("includes/classes/notification.php");


if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: register.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: register.php");
  }





if (isset($_SESSION['username'])){
	// It is created when logged in(Check includes/form_handler/login_handler.php)
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else{
	header("Location: register.php");
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Billi</title>
    <link rel="icon" type="image/png" href="assets/img/signin/billioni black.png" />

		<!-- css -->
    <?php include "includes/boot.html"; ?>
    <link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />

		<!-- js -->

		<script src="assets/js/jquery-3.4.1.js"></script>
		<script src="assets/js/jquery.Jcrop.min.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>
  <script src="assets/js/billi.js"></script>
  </head>
  <body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha256-sfG8c9ILUB8EXQ5muswfjZsKICbRIJUG/kBogvvV5sY=" crossorigin="anonymous"></script>
<div class="header">

  <form id="srchbox"action="search.php" method="get" name="search_form">
      <table>
        	<td><input type="text" size="50" required style="border-radius: 10px;" placeholder="Search Username"onkeyup="getLiveSearchUsers(this.value, '<?= $userLoggedIn ?>')" name="q"  autocomplete="off" ></td>
        	<td><input id="srchbtn" type="submit" value="Search" name="submit"></td>
      </table>
  </form>



    <div class="menu_ul_center">
        <a class="menu_li_center" href="index.php">Billi</a>
      <a class="menu_li_center" href="all.php">All Page</a>
      <a class="menu_li_center" href="post_page.php">Post</a>
    </div>

          <?php
            //Unread messages
  			$messages = new Message($con, $userLoggedIn);
  			$num_messages = $messages->getUnreadNumber();

          //Unread Notifications
          $notifications = new Notification($con, $userLoggedIn);
          $num_notifications = $notifications->getUnreadNumber();

      ?>

  <div class="header_right">
    <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')">Note<?php  if($num_notifications > 0){  echo '<span class="notification_badge" id="unread_notification">'.$num_notifications.'</span>';  }  ?>
  </a>
  <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')">Message <?php	if($num_messages > 0){	echo '<span class="notification_badge" id="unread_message">'.$num_messages.'</span>';		}	?>
</a>
  <a class="nav-link" href="includes/handlers/logout.php">log out</a>
       <a style="padding: 0px;" href="<?php echo $userLoggedIn; ?>">  <img id="profil_header" src="<?= $user['profile_pic']; ?>" alt="Profile picture">  </a>
  </div>


</div>
<div class="dropdown_data_window"></div>
			<input type='hidden' id="dropdown_data_type" value="">

	</div>

<div class="wrapper">
