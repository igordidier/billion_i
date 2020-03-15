<?php
include("includes/header.php");
include("includes/classes/user.php");
include("includes/classes/post.php");
// include("assets/js/jquery.js");


if (isset($_GET['profile_username'])) {
  $username = $_GET['profile_username'];
  $user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username ='$username'  " );
  $user_array = mysqli_fetch_array($user_details_query);


if(isset($_POST['remove_friend'])){
  $user = new USER($con, $userLoggedIn);
  $user->removefriend($username);
}

if(isset($_POST['add_friend'])){
  $user = new USER($con, $userLoggedIn);
  $user->follow($username);
}

if(isset($_POST['edit'])){
  header("location: upload.php");
}
// if (!isset($_SESSION['username'])) {
//   	$_SESSION['msg'] = "You must log in first";
//   	header('location: register.php');
//   }
//   if (isset($_GET['logout'])) {
//   	session_destroy();
//   	unset($_SESSION['username']);
//   	header("location: register.php");
//   }




}
 ?>




    <div class="profile_left">


        <img class="profile_pic_profile" src="<?php echo $user_array['profile_pic']; ?>" alt="profil picture">


            <div class="profil_info">

              <form class="follow_form" action="<?php echo $username; ?>" method="post">
                <?php
                			$profile_user_obj = new User($con, $username);
                			// If user is closed status go to user_closed page
                			if($profile_user_obj->isClosed()){
                				header("Location: user_closed.php");
                			}

                			$logged_in_user_obj = new User($con, $userLoggedIn);

                			if($userLoggedIn != $username){ // if logged user is not same with username

                				if($logged_in_user_obj->isFollowing($username)){ // if logged user is friend of target user
                					echo '<input type="submit" name="remove_friend" class="follow_btn" value="Unfollow"><br/>';
                				}

                				// else if($logged_in_user_obj->didReceiveRequest($username)){
                				// 	echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br/>';
                				// }
                        //
                				// else if($logged_in_user_obj->didSendRequest($username)){
                				// 	echo '<input type="submit" name="" class="default" value="Request Sent"><br/>';
                				// }

                				else{
                					echo '<input class="follow_btn" type="submit" name="add_friend"  value="follow"><br/>';
                				}

                			} else {
                        echo '<input class="follow_btn" type="submit" name="edit"  value="Edit profile"><br/>';
                      }
                			?>
                		</form>


<ul class="profil_stat">
  <?php $num_followers = (substr_count($user_array['followers'], ",")) -1; ?>
  <li>Post: <?php echo $user_array['num_posts']; ?> </li>
  <li>Followers: <?php echo $num_followers; ?></li>
</ul>
            </div>


    </div>

    <div class="main_collum">



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
    			url: "includes/handlers/ajax_load_profile_posts.php",
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
