<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type='text/css' href="assets/css/index.css">
</head>
<body>

<style type="text/css">
	body{
		background-color: #fff;
	}

	form{
		position: absolute;
		top: 0;
	}
</style>

<?php
	require_once ('config/config.php');
	include_once ("includes/classes/User.php");
	include_once ("includes/classes/Post.php");
	include_once ("includes/classes/notification.php");


	//Get id of post
	if(isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
	}

	//Check user loggedin
	if (isset($_SESSION['username'])){
		// It is created when logged in(Check includes/form_handler/login_handler.php)
		$userLoggedIn = $_SESSION['username'];
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
		$user = mysqli_fetch_array($user_details_query);
	}
	else{
		header("Location: register.php");
	}

	//get number of likes of post
	$get_likes = mysqli_query($con, "SELECT likes, added_by FROM posts WHERE id='$post_id'");
	$row = mysqli_fetch_array($get_likes);
	//number of likes of post
	$total_likes = $row['likes'];
	//owner of post
	$user_liked = $row['added_by'];

	// get user detail of post
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user_liked'");
	$row = mysqli_fetch_array($user_details_query);
	$total_user_likes = $row['num_likes']; // total number of likes what post owner got

	//Like Button
	if(isset($_POST['like_button'])) {
		$total_likes++;
		$query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
		$total_user_likes++;
		$user_likes = mysqli_query($con, "UPDATE user SET num_likes='$total_user_likes' WHERE username='$user_liked'");
		//insert who like what post
		$insert_user = mysqli_query($con, "INSERT INTO likes VALUES(NULL, '$userLoggedIn', '$post_id')");

		//insert notifications
		if($user_liked != $userLoggedIn){
		$notification = new Notification($con, $userLoggedIn);
		$notification->insertNotification($post_id, $user_liked, "like");
	}
}
	//Unlike Button
	if(isset($_POST['unlike_button'])) {
		$total_likes--;
		$query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
		$total_user_likes--;
		$user_likes = mysqli_query($con, "UPDATE user SET num_likes='$total_user_likes' WHERE username='$user_liked'");
		//insert who like what post
		$insert_user = mysqli_query($con, "DELETE FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
	}


	//Check for my previous liked of this post
	$check_query = mysqli_query($con, "SELECT * FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
	$num_rows = mysqli_num_rows($check_query);

	//if I already checked like on this post
	if($num_rows > 0){
		echo ('<form action="like.php?post_id='.$post_id.'" method="POST">
		<button type="submit" name="unlike_button" style="border: 0px;background-color: transparent;">
		<img  src="assets/img/icons/bump_liked.png" style="width: 30px;">
		</button>
		<div style="margin: 10px;float: right;">
				  	'.$total_likes.' Likes
				  </div>
			  </form>
		');
	}
	// if I didn't check like on this post yet
	else{
		echo ('<form action="like.php?post_id='.$post_id.'" method="POST">
		<button type="submit" name="like_button" style="border: 0px;background-color: transparent;">
		<img  src="assets/img/icons/bump.png" style="width: 30px;">
		</button>
		<div style="margin: 10px;float: right;">
				  	'.$total_likes.' Likes
				  </div>
			  </form>
		');
	}


	?>


</body>
</html>
