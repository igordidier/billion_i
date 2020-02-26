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

		<!-- css -->
    <?php include "includes/boot.html"; ?>
    <link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />

		<!-- js -->

		<script src="assets/js/jquery.jcrop.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>
  </head>
  <body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha256-sfG8c9ILUB8EXQ5muswfjZsKICbRIJUG/kBogvvV5sY=" crossorigin="anonymous"></script>
<div class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">Billi</a>

    <a class="navbar-brand" href="all.php">All Page</a>

		<a class="navbar-brand" href="post_page.php">Post</a>


  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">


    <form id="srchbox"action="search.php" method="get">
  <table>
    	<td><input type="text" name="search" size="100" required style="border-radius: 10px;" placeholder="Search Username"></td>
    	<td><input id="srchbtn" type="submit" value="Search" name="submit"></td>
  </table>
    </form>


    <li class="nav-item active">
    <a class="nav-link" href="includes/handlers/logout.php">log out</a>
    <a href="<?php echo $userLoggedIn; ?>"> <?php echo ucfirst($_SESSION["username"]); ?> </a>
    </li>
  </div>
</nav>
</div>

<div class="wrapper">
