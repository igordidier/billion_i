




  <?php

  include("includes/header.php");


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



</div>
  </body>
</html>
