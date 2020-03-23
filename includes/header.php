
<?php



require 'config/config.php';
include("includes/classes/user.php");
include("includes/classes/post.php");
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

  <form id="srchbox"action="search.php" method="get">
      <table>
        	<td><input type="text" name="search" size="50" required style="border-radius: 10px;" placeholder="Search Username"></td>
        	<td><input id="srchbtn" type="submit" value="Search" name="submit"></td>
      </table>
  </form>

    <div class="menu_ul_center">
        <a class="menu_li_center" href="index.php">Billi</a>
      <a class="menu_li_center" href="all.php">All Page</a>
      <a class="menu_li_center" href="post_page.php">Post</a>
    </div>

          <?php

          //Unread Notifications
          $notifications = new Notification($con, $userLoggedIn);
          $num_notifications = $notifications->getUnreadNumber();
          //Unread Notifications
        //	 $user_obj = new User($con, $userLoggedIn);
      //	 $num_requests = $user_obj->getNumberOfFriendRequests();
      ?>

  <div class="header_right">
    <a href="javascript:void(0);" onclick="getDropdownData('<?= $userLoggedIn; ?>', 'notification')">Note<?php  if($num_notifications > 0){  echo '<span class="notification_badge" id="unread_notification">'.$num_notifications.'</span>';  }  ?>
  </a>
  <a class="nav-link" href="includes/handlers/logout.php">log out</a>
       <a style="padding: 0px;" href="<?php echo $userLoggedIn; ?>">  <img id="profil_header" src="<?= $user['profile_pic']; ?>" alt="Profile picture">  </a>
  </div>


</div>

<script>
		var userLoggedIn = '<?php echo $userLoggedIn; ?>';

		$(document).ready(function(){

			$('.dropdown_data_window').scroll(function(){
				var inner_height = $('.dropdown_data_window').innerHeight(); // div containing data
				var scroll_top = $('.dropdown_data_window').scrollTop();
				//data of what you come next page
				var page = $('.dropdown_data_window').find('.nextPageDropDownData').val();
				var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

				if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false'){

					var pageName; // Holds name of posts to send ajax request to
					var type = $('#dropdown_data_type').val();

					if(type == 'notification'){
						pageName= "ajax_load_notifications.php"; //Not use now, just declare
					}
					else if(type=='message'){
						pageName = "ajax_load_messages.php";
					}



					var ajaxReq = $.ajax({
						url: "includes/handlers/" + pageName,
						type: "POST",
						data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
						cache: false,

						success: function(data){
							//Removes current .nextpage when scroll is bottom
							$('.dropdown_data_window').find('.nextPageDropDownData').remove();
							//Removes current .no more posts when scroll is bottom
							$('.dropdown_data_window').find('.noMoreDropdownData').remove();

							$('.dropdown_data_window').append(data);
						}
					});
				} //End if

				return false;

			}); // End window.scroll(function()

		});

	</script>

<div class="wrapper">
