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

if (isset($_POST['post'])) {
  $post = new Post($con, $userLoggedIn);
  $post -> submitpost($_POST['post_text'], 'none');
  header("location: index.php");
}

  ?>




<div class="main_collum">

  <form class="post_form" action="index.php" method="post">

    <textarea name="post_text" rows="8" cols="80" placeholder="Quick word?" maxlength="750"></textarea>
    <input type="submit" name="post" value="Post">
    <hr>


  </form>

  <div class="posts_area"></div>
  
  <img id="loading" src="assets/img/icons/loading.gif" style="
    display: flex;
    margin: auto;
">


</div>

<script>
var userLoggedIn = '<?php echo $userLoggedIn; ?>';

$(document).ready(function() {

  $('#loading').show();

  //Original ajax request for loading first posts
  $.ajax({
    url: "includes/handlers/ajax_load_posts.php",
    type: "POST",
    data: "page=1&userLoggedIn=" + userLoggedIn,
    cache:false,

    success: function(data) {
      $('#loading').hide();
      $('.posts_area').html(data);
    }
  });

  $(window).scroll(function() {
    var height = $('.posts_area').height(); //Div containing posts
    var scroll_top = $(this).scrollTop();
    var page = $('.posts_area').find('.nextPage').val();
    var noMorePosts = $('.posts_area').find('.noMorePosts').val();

    if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
      $('#loading').show();

      var ajaxReq = $.ajax({
        url: "includes/handlers/ajax_load_posts.php",
        type: "POST",
        data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
        cache:false,

        success: function(response) {
          $('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
          $('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage

          $('#loading').hide();
          $('.posts_area').append(response);
        }
      });

    } //End if

    return false;

  }); //End (window).scroll(function())


});

</script>

</div>
  </body>
</html>
