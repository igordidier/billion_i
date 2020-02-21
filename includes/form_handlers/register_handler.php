<?php
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
  $username = strip_tags($_POST['username']); //remove html tags
  $username = str_replace(' ','', $username); //remove space
  $username = ucfirst(strtolower($username));
  $_SESSION['username'] = $username;

  $fname = strip_tags($_POST['fname']); //remove html tags
  $fname = str_replace(' ','', $fname); //remove space
  $fname = ucfirst(strtolower($fname));
  $_SESSION['fname'] = $fname;

  $lname = strip_tags($_POST['lname']); //remove html tags
  $lname = str_replace(' ','', $lname); //remove space
  $lname = ucfirst(strtolower($lname));
  $_SESSION['lname'] = $lname;

  $em = strip_tags($_POST['email']); //remove html tags
  $em = str_replace(' ','', $em); //remove space
  $em = ucfirst(strtolower($em));
  $_SESSION['email'] = $em;

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
     array_push($error_array,"email Already used <br>");
}

  }else {
    array_push($error_array,"Invalide Email <br>");
  }

  if (strlen($fname) > 25 || strlen($fname) < 2){
    array_push($error_array,"First Name Must Be Between 2 and 25 characteres <br>");
  }
  if (strlen($lname) > 25 || strlen($lname) < 2){
    array_push($error_array,"last Name Must Be Between 2 and 25 characteres <br>");
  }
  if ($psd != $psd2) {
    array_push($error_array,"Password do not match <br>");
  }
  if (strlen($psd) > 30 || strlen($psd)< 3) {
      array_push($error_array,"password Must between 5 and 30 characteres <br>");
  }
  $e_check2 = mysqli_query($con, "SELECT username FROM users wHERE username ='$username'");

  //count number ov rows retern

  $num_rows2 = mysqli_num_rows($e_check2);

  if ($num_rows2> 0) {
       array_push($error_array,"Username Already used <br>");
  }



if (empty($error_array)) {
  $psd = md5($psd); // encrypt


  //profil picture default
  $rand = rand(1,2); //random pic

  if ($rand == 1) {
    $profile_pics = "assets/img/profile_pics/default/head_deep_blue.png";
$_SESSION['profile_pic'] = $profile_pics;
  }
  elseif ($rand == 2) {
      $profile_pics = "assets/img/profile_pics/default/head_alizarin.png";

    }


      $query = mysqli_query($con,"INSERT INTO users(first_name,last_name,username,email,password,signup_date,profile_pic,num_posts,num_likes,num_follower,follow_array,follwers) VALUES('$fname','$lname','$username','$em','$psd','$date','$profile_pics','0','0','0',',',',')");
      $_SESSION['success'] = "You are now logged in";

  header("location: index.php");

}

}
?>
