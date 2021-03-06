<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="assets/css/register_style.css">
    <link rel="icon" type="image/png" href="assets/img/signin/billioni black.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/register.js">

    </script>
  </head>
  <body>

    <img class="rightbanner" src="assets/img/signin/rightbanner.jpg" alt="rooftop">
    <img class="leftbanner" src="assets/img/signin/leftbanner.jpg" alt="rooftop">
    <?php
	if(isset($_POST['register_button'])){
		echo '
		<script>
		$(document).ready(function(){
			$("#first").hide();
			$("#second").show();
		});
		</script>
		';
	}
	?>


<!-- login form -->

<div id="first">

    <div class="header">
    	<h2>Log In</h2>
    </div>

    <form class="" action="register.php" method="post">
              <?php include('config/errors2.php'); ?>
              <input type="text" name="log_email" placeholder="Email Adresse/Username" value="<?php if (isset($_SESSION['login_email'])) {
                echo $_SESSION['reg_email'];
              } ?>" required >
              <br>
              <input type="password" name="log_password" placeholder="Password">
              <br>
              <input type="submit" name="login_button" value="Sign Up">
              <br>
              <a href="#"id="signup"class="signup">Don't have an account? Sign up</a>
    </form>

</div>

<!-- sign up form -->

<div id="second">

    <div class="header">
        <h2>Register</h2>
    </div>
          <form class="" action="register.php" method="post">
                <?php include('config/errors.php'); ?>
                  <input type="text" name="username" placeholder="Usename" value="<?php if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                  } ?>" required>
                  <br>
                  <input type="text" name="fname" placeholder="firstname" value="<?php if (isset($_SESSION['fname'])) {
                    echo $_SESSION['fname'];
                  } ?>" required>
                  <br>
                  <input type="text" name="lname" placeholder="lastname" value="<?php if (isset($_SESSION['lname'])) {
                    echo $_SESSION['lname'];
                  } ?>" required>
                  <br>
                  <input type="email" name="email" placeholder="email" value="<?php if (isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                  } ?>" required>
                  <br>
                  <input type="password" name="reg_psd" placeholder="Password" required>
                  <br>
                  <input type="password" name="reg_psd2" placeholder="Confirm Password" required>
                  <br>
                  <input type="submit" name="register_button" value="Sign Up">
                  <br>
                  <a href="#"id="signin"class="signin">Already have an account? Sign in</a>

          </form>

    </div>
            <img class="logo" src="assets/img/signin/billioni.png" alt="logo">
  </body>
</html>
