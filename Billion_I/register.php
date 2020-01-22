<?php
session_start();
$con = mysqli_connect("localhost","root","","billi");

if (mysqli_connect_errno()) {
  echo "Failed to connect:" . mysqli_connect_errno();
}

//declare variables

$fname = "";
$lname = "";
$em = "";
$psd = "";
$psd2 = "";
$date = "";
$error_array= array();


if (isset($_POST['register_button'])) {
  // register form
  $username = strip_tags($_POST['reg_username']); //remove html tags
  $username = str_replace(' ','', $username); //remove space
  $username = ucfirst(strtolower($username));
  $_SESSION['reg_username'] = $username;

  $fname = strip_tags($_POST['reg_fname']); //remove html tags
  $fname = str_replace(' ','', $fname); //remove space
  $fname = ucfirst(strtolower($fname));
  $_SESSION['reg_fname'] = $fname;

  $lname = strip_tags($_POST['reg_lname']); //remove html tags
  $lname = str_replace(' ','', $lname); //remove space
  $lname = ucfirst(strtolower($lname));
  $_SESSION['reg_lname'] = $lname;

  $em = strip_tags($_POST['reg_email']); //remove html tags
  $em = str_replace(' ','', $em); //remove space
  $em = ucfirst(strtolower($em));
  $_SESSION['reg_email'] = $em;

  $psd = strip_tags($_POST['reg_psd']); //remove html tags
  $psd2 = strip_tags($_POST['reg_psd2']); //remove html tags

  $date= date("Y-m-d"); //gets date

  if (filter_var($em, FILTER_VALIDATE_EMAIL)) {

    $em = filter_var($em, FILTER_VALIDATE_EMAIL);

    //check if email already exist

$e_check = mysqli_query($con, "SELECT email FROM users wHERE email ='$em'");

//count number ov rows retern

$num_rows = mysqli_num_rows($e_check);

if ($num_rows > 0) {
     array_push($error_array, "email Already used <br>");
}

  }else {
    array_push($error_array, "Invalide Email <br>");
  }

  if (strlen($fname) > 25 || strlen($fname) < 2){
    array_push($error_array, "First Name Must Be Between 2 and 25 characteres <br>");
  }
  if (strlen($lname) > 25 || strlen($lname) < 2){
    array_push($error_array, "last Name Must Be Between 2 and 25 characteres <br>");
  }
  if ($psd != $psd2) {
    array_push($error_array, "Password do not match <br>");
  }
  if (strlen($psd) > 30 || strlen($psd)< 3) {
      array_push($error_array, "password Must between 5 and 30 characteres <br>");
  }
  $e_check2 = mysqli_query($con, "SELECT username FROM users wHERE username ='$username'");

  //count number ov rows retern

  $num_rows2 = mysqli_num_rows($e_check2);

  if ($num_rows2> 0) {
       array_push($error_array, "Username Already used <br>");
  }



if (empty($error_array)) { 
  $psd = md5($psd); // encrypt


  //profil picture default
  $rand = rand(1,2,3,4,5); //random pic

  if ($rand == 1) {
    $profile_pics = "assests/img/profile_pics/default/head_deep_blue.png";
  }
  elseif ($rand == 2) {
      $profile_pics = "assests/img/profile_pics/default/head_alizarin.png";
  }
  elseif ($rand == 3) {
      $profile_pics = "assests/img/profile_pics/default/head_wisteria.png";
  }
  elseif ($rand == 4) {
      $profile_pics = "assests/img/profile_pics/default/head_red.png";
  }
  elseif ($rand == 5) {
      $profile_pics = "assests/img/profile_pics/default/head_emerald.png";
  }

}

}

 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sigh Up</title>
  </head>
  <body>
    <form class="" action="register.php" method="post">
      <?php  if (count($error_array) > 0) : ?>
        <div class="error">
        	<?php foreach ($error_array as $error_array) : ?>
        	  <p><?php echo $error_array ?></p>
        	<?php endforeach ?>
        </div>
      <?php  endif ?>
      <input type="text" name="reg_username" placeholder="Usename" value="<?php if (isset($_SESSION['reg_username'])) {
        echo $_SESSION['reg_username'];
      } ?>" required>
      <br>
      <input type="text" name="reg_fname" placeholder="firstname" value="<?php if (isset($_SESSION['reg_fname'])) {
        echo $_SESSION['reg_fname'];
      } ?>" required>
      <br>
      <input type="text" name="reg_lname" placeholder="lastname" value="<?php if (isset($_SESSION['reg_lname'])) {
        echo $_SESSION['reg_lname'];
      } ?>" required>
      <br>
      <input type="email" name="reg_email" placeholder="email" value="<?php if (isset($_SESSION['reg_email'])) {
        echo $_SESSION['reg_email'];
      } ?>" required>
      <br>
      <input type="password" name="reg_psd" placeholder="Password" required>
      <br>
      <input type="password" name="reg_psd2" placeholder="Confirm Password" required>
      <br>
      <input type="submit" name="register_button" value="Sign Up">

    </form>
  </body>
</html>
