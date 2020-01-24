<?php

require 'config/config.php';

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Billi</title>
  </head>
  <body>
<?php if (isset($_SESSION['success'])){
echo "You Heve Created an account Correctly! welcome . $_SESSION[reg_username] .";
} ?>


  </body>
</html>
