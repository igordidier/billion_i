<?php
class Post {
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

	public function submitPost($body, $user_to) {
		$body = strip_tags($body); //removes html tags
		$body = mysqli_real_escape_string($this->con, $body);
		$check_empty = preg_replace('/\s+/', '', $body); //Deltes all spaces

		if($check_empty != "") {


			//Current date and time
			$date_added = date("Y-m-d H:i:s");
			//Get username
			$added_by = $this->user_obj->getUsername();

			//If user is on own profile, user_to is 'none'
			if($user_to == $added_by) {
				$user_to = "none";
			}

			//insert post
      $query = mysqli_query($this->con, "INSERT INTO posts VALUES(NULL, '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0',',')");
      $returned_id = mysqli_insert_id($this->con);

      //Update post count for user
    			$num_posts = $this->user_obj->getNumPosts(); // get original num_posts
    			$num_posts++; // add 1
    			$update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");

		}
	}

	public function loadPostsFriends($data, $limit) {

		$page = $data['page'];
		$userLoggedIn = $this->user_obj->getUsername();

		if($page == 1)
			$start = 0;
		else
			$start = ($page - 1) * $limit;


		$str = ""; //String to return
		$data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

		if(mysqli_num_rows($data_query) > 0) {


			$num_iterations = 0; //Number of results checked (not necasserily posted)
			$count = 1;

			while($row = mysqli_fetch_array($data_query)) {
				$id = $row['id'];
				$body = $row['body'];
				$added_by = $row['added_by'];
				$date_time = $row['date_added'];


				//Prepare user_to string so it can be included even if not posted to a user
				if($row['user_to'] == "none") {
					$user_to = "";
				}
				else {
					$user_to_obj = new User($con, $row['user_to']);
					$user_to_name = $user_to_obj->getFirstAndLastName();
					$user_to = "to <a href='" . $row['user_to'] ."'>" . $user_to_name . "</a>";
				}

				//Check if user who posted, has their account closed
				$added_by_obj = new User($this->con, $added_by);
				// if($added_by_obj->isClosed()) {
				// 	continue;
				// }

				$user_logged_obj = new User($this->con, $userLoggedIn);
							if($user_logged_obj->isFollowing($added_by)){

					if($num_iterations++ < $start)
						continue;


					//Once 10 posts have been loaded, break
					if($count > $limit) {
						break;
					}
					else {
						$count++;
					}

					// if($userLoggedIn == $added_by){
					// 	$delete_button = "<button class='delete_button btn-danger' name='result' id='post$id'>X</button>";
					// } else{
					// 	$delete_button = "";
					// }

					$user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
					$user_row = mysqli_fetch_array($user_details_query);
					$first_name = $user_row['first_name'];
					$last_name = $user_row['last_name'];
					$profile_pic = $user_row['profile_pic'];
?>

										<script>
										function toggle<?= $id ?>(){
							var target = $(event.target);
							if(!target.is('a')){
								var element = document.getElementById("toggleComment<?= $id; ?>");
								if(element.style.display == "block"){
									element.style.display = "none";
								} else{
									element.style.display = "block";
								}
							}
						}

										</script>


<?php
$comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
					$comments_check_num = mysqli_num_rows($comments_check);
					//Timeframe
					$date_time_now = date("Y-m-d H:i:s");
					$start_date = new DateTime($date_time); //Time of post
					$end_date = new DateTime($date_time_now); //Current time
					$interval = $start_date->diff($end_date); //Difference between dates
					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . " year ago"; //1 year ago
						else
							$time_message = $interval->y . " years ago"; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = " ago";
						}
						else if($interval->d == 1) {
							$days = $interval->d . " day ago";
						}
						else {
							$days = $interval->d . " days ago";
						}


						if($interval->m == 1) {
							$time_message = $interval->m . " month". $days;
						}
						else {
							$time_message = $interval->m . " months". $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = "Yesterday";
						}
						else {
							$time_message = $interval->d . " days ago";
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . " hour ago";
						}
						else {
							$time_message = $interval->h . " hours ago";
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . " minute ago";
						}
						else {
							$time_message = $interval->i . " minutes ago";
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = "Just now";
						}
						else {
							$time_message = $interval->s . " seconds ago";
						}
					}

					$str .= "		 <div class='full_post'onClick='javascript:toggle$id()'>
					 					<div class='status_post' >

					 													<a href='$added_by'>
					 														<img class='profile_pic' src='$profile_pic' width='50'>
					 													</a>


																			<a href='$added_by'>
																				$added_by
																			</a>

					 														<span id='time'>$time_message</span>

					 													</div>
					 													<div class='post_body'>
					 														<p class='tetx_post'>$body</p>
					 														<br>


					 													</div>
																		<div class='newsfeedPostOptions'>
									Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
									<iframe src='../like.php?post_id=$id'  frameborder='0' style='height: 40px;width: 200px;' scrolling='no'></iframe>
								</div>
																		<div class='post_comment' id='toggleComment$id' style='display:none;'>
								<iframe src='../../comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0' ></iframe>
							</div>
																		</div>

																"	;
}

			} //End while loop


?>
<script>
	$(document).ready(function(){
		$('#post<?= $id; ?>').on('click', function(){
			bootbox.confirm("Are you sure you want to delete this post?", function(result){

				//send this method, and inside of var result insert argument result, and send it
				$.post("includes/form_handler/delete_post.php?post_id=<?= $id; ?>", {result:result});

				if(result){
					setTimeout(function(){
						location.reload();
					}, 300);
				}
			});
		});
	});
</script>




<?php


			if($count > $limit)
				$str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
							<input type='hidden' class='noMorePosts' value='false'>";
			else
				$str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: centre;'> posts to show! </p>";
		}

		echo $str;


	}

	public function loadProfilePosts($data, $limit){

			$page = $data['page'];
			$profileUser = $data['profileUsername'];
			$userLoggedIn = $this->user_obj->getUsername();

			//added for scrolling
			if($page == 1){
				$start = 0;
			} else{
				$start = ($page - 1) * $limit;
			}

			$str = ""; //String to return
			$data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' AND ((added_by='$profileUser' AND user_to='none') OR user_to='$profileUser') ORDER BY id DESC");

			if(mysqli_num_rows($data_query) > 0){

				//added for scrolling
				$num_iterations = 0; //Number of results checked(not necessarily posted), 반복
				$count = 1;

				while($row = mysqli_fetch_array($data_query)){
					$id = $row['id'];
					$body = $row['body'];
					$added_by = $row['added_by'];
					$date_time = $row['date_added'];
					$like = mysqli_query($this->con, "SELECT * FROM likes WHERE post_id='$id' AND username='$userLoggedIn'");
					if(mysqli_num_rows($like)){
						$like_check = "unlike";
					}
					else{
						$like_check = "like";
					}
					$numlike = mysqli_query($this->con, "SELECT * FROM likes WHERE post_id='$id'");
					$numlike = mysqli_num_rows($numlike);


					//it makes not load previous newsfeed
					if($num_iterations++ < $start){
						continue;
					}

					//Once 10 posts have been loaded, break
					if($count > $limit){
						break;
					} else{
						$count++;
					}

					if($userLoggedIn == $added_by){
						$delete_button = "<button class='delete_button btn-danger'  id='post$id'>X</button>";
					} else{
						$delete_button = "";
					}

					$user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
					$user_row = mysqli_fetch_array($user_details_query);
					$first_name = $user_row['first_name'];
					$last_name = $user_row['last_name'];
					$profile_pic = $user_row['profile_pic'];
					?>

					<script>
					function toggle<?= $id ?>(){
		var target = $(event.target);
		if(!target.is('a')){
			var element = document.getElementById("toggleComment<?= $id; ?>");
			if(element.style.display == "block"){
				element.style.display = "none";
			} else{
				element.style.display = "block";
			}
		}
	}

					</script>

					<?php

					$comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
					$comments_check_num = mysqli_num_rows($comments_check);
					//Timeframes
					$date_time_now = date("Y-m-d H:i:s");
					$start_date = new DateTime($date_time); //Time of post
					$end_date = new DateTime($date_time_now); //Current time
					$interval = $start_date->diff($end_date); //Difference between dates

					if($interval->y >= 1){
						if($interval == 1){
							$time_message = $interval->y." year ago"; //1 year ago
						} else{
							$time_message = $interval->y." years ago"; //1+ year ago
						}
					}
					else if($interval->m >= 1){
						if($interval->d == 0){
							$days = " ago";
						} else if($interval->d == 1){
							$days = $interval->d." day ago";
						} else{
							$days = $interval->d." days ago";
						}

						if($interval->m == 1){
							$time_message = $interval->m." month".$days;
						} else{
							$time_message = $interval->m." month".$days;
						}
					}
					else if($interval->d >= 1){
						if($interval->d == 1){
							$time_message = "Yesterday";
						} else{
							$time_message = $interval->d." days ago";
						}
					}
					else if($interval->h >= 1){
						if($interval->h == 1){
							$time_message = $interval->h." hour ago";
						} else{
							$time_message = $interval->h." hours ago";
						}
					}
					else if($interval->i >= 1){
						if($interval->i == 1){
							$time_message = $interval->i." minute ago";
						} else{
							$time_message = $interval->i." minutes ago";
						}
					}
					else {
						if($interval->s < 30){
							$time_message = "Just now";
						} else{
							$time_message = $interval->s." seconds ago";
						}
					}

					$str .= "		 <div class='full_post'onClick='javascript:toggle$id()'>
					 					<div class='status_post' >

					 													<a href='$added_by'>
					 														<img class='profile_pic' src='$profile_pic' width='50'>
					 													</a>


																			<a href='$added_by'>
																				$added_by
																			</a>
																				$delete_button
					 														<span id='time'>$time_message</span>

					 													</div>
					 													<div class='post_body'>
					 														<p class='tetx_post'>$body</p>
					 														<br>


					 													</div>
																		<div class='newsfeedPostOptions'>
									Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
									<iframe src='../like.php?post_id=$id'  frameborder='0' style='height: 40px;width: 200px;' scrolling='no'></iframe>
								</div>
																		<div class='post_comment' id='toggleComment$id' style='display:none;'>
								<iframe src='../../comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0' ></iframe>
							</div>
																		</div>

																";
				?>

				<script>
					$(document).ready(function(){
						$('#post<?= $id; ?>').on('click', function(){
							bootbox.confirm("Are you sure you want to delete this post?", function(result){

								//send this method, and inside of var result insert argument result, and send it
								$.post("includes/form_handlers/delete_post.php?post_id=<?= $id; ?>", {result:result});

								if(result){
									setTimeout(function(){
										location.reload();
									}, 300);
								}
							});
						});
					});
				</script>

				<?php
				} //End while loop

				//added for scrolling
				if($count > $limit){ //it means $count is loaded already
					$str.= "<input type='hidden' class='nextPage' value='".($page + 1)."'>
					<input type='hidden' class='noMorePosts' value='false'>";
				} else{ // $count is under $limit
					$str.= "<input type='hidden' class='noMorePosts' value='true'>
							<p style='text-align: center;'>
								No more posts to show
							</p>";
				}
			}

			echo $str;
		}


}

?>
