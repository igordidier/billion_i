




  <?php

  include("includes/header.php");
  include("includes/classes/user.php");
  include("includes/classes/post.php");
  //include("assets/js/jquery.js");


if (isset($_POST['post'])) {
  $post = new Post($con, $userLoggedIn);
  $post -> submitpost($_POST['post_text'], 'none');
  header("location: index.php");
}

  ?>


<a href="<?= $userLoggedIn ?>" >  <div class="user_details column">
  		<img style="border-radius: 50%;width: 150px;height: 150px;display: flex;margin: auto;" src="<?= $user['profile_pic']; ?>">
  		<div class="user_details_left_right">
  			<a href="<?= $userLoggedIn ?>">
  				<?= $user['first_name'] . " " . $user['last_name'];	?>
  			</a>
  			<br/>
  			<?php
  			echo "Posts: ".$user['num_posts']. "<br/>";
  			echo "Likes: ".$user['num_likes'];
  			 ?>
  		</div>

  </div>
  </a>

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

$(function(){

	var userLoggedIn = '<?php echo $userLoggedIn; ?>';
	var inProgress = false;

	loadPosts(); //Load first posts

    $(window).scroll(function() {
    	var bottomElement = $(".status_post").last();
    	var noMorePosts = $('.posts_area').find('.noMorePosts').val();

        // isElementInViewport uses getBoundingClientRect(), which requires the HTML DOM object, not the jQuery object. The jQuery equivalent is using [0] as shown below.
        if (isElementInView(bottomElement[0]) && noMorePosts == 'false') {
            loadPosts();
        }
    });

    function loadPosts() {
        if(inProgress) { //If it is already in the process of loading some posts, just return
			return;
		}

		inProgress = true;
		$('#loading').show();

		var page = $('.posts_area').find('.nextPage').val() || 1; //If .nextPage couldn't be found, it must not be on the page yet (it must be the first time loading posts), so use the value '1'

		$.ajax({
			url: "includes/handlers/ajax_load_all_posts.php",
			type: "POST",
			data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(response) {
				$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
				$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage
				$('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage

				$('#loading').hide();
				$(".posts_area").append(response);

				inProgress = false;
			}
		});
    }

    //Check if the element is in view
    function isElementInView (el) {
        var rect = el.getBoundingClientRect();

        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && //* or $(window).height()
            rect.right <= (window.innerWidth || document.documentElement.clientWidth) //* or $(window).width()
        );
    }
});

</script>

</div>
  </body>
</html>
