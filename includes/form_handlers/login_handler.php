<?php
$error_array2 = array();
if (isset($_POST['login_button'])) {
  $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize Email

  $_SESSION['log_email'] = $email;
  $psd = md5($_POST['log_password']);

  $check_database_query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' OR username='$email' AND password='$psd'");
  $check_login_query = mysqli_num_rows($check_database_query);

  if ($check_login_query == 1) {
    $row = mysqli_fetch_array($check_database_query);
    $username = $row['username'];
    $email = $row['email'];
    $fname = $row['first_name'];

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    header("location: index.php");
  }else {
    array_push($error_array2,"Email/Username or Password Incorrect");
  }
}

 ?>
