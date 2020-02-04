<?php

class Post {
	//to make accesibility only inside of class(e.g)function), not allowed call var
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

	public function submitPost($body, $user_to){
		$body = strip_tags($body);

		//make string safe
		$body = mysqli_real_escape_string($this->con, $body);

		$body = str_replace('\r\n','\n',$body);
		$body = nl2br($body);
		//check if blank, delete
		$check_empty = preg_replace('/\s+/', '', $body);




    if($check_empty != ""){
      //current date(Year-Month-Day Hour-minutes-seconds)
      $date_added = date("Y-m-d H:i:s");

			//Get username
						$added_by = $this->user_obj->getUsername();

      if($user_to == $added_by){
        $user_to == 'none';
      }

      //insert post
      $query = mysqli_query($this->con, "INSERT INTO posts VALUES(NULL, '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
      $returned_id = mysqli_insert_id($this->con);

      //Update post count for user
    			$num_posts = $this->user_obj->getNumPosts(); // get original num_posts
    			$num_posts++; // add 1
    			$update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");


			//Update post count for user
					$num_posts = $this->user_obj->getNumPosts(); // get original num_posts
			$num_posts++; // add 1
			$update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");
          }
        }



	  public function loadpostfriends(){
		$str = ""; //String to return
		$data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

		while($row = mysqli_fetch_array($data)){
				$id = $row['id'];
				$body = $row['body'];
				$added_by = $row['added_by'];
				$date_time = $row['date_added'];



				$user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, username, profile_pic FROM users WHERE username='$added_by'");
					$user_row = mysqli_fetch_array($user_details_query);
					$first_name = $user_row['first_name'];
					$last_name = $user_row['last_name'];
					$username = $user_row['username'];
					$profile_pic = $user_row['profile_pic'];
				// $imagePath = $row['image'];
				// $like = mysqli_query($this->con, "SELECT * FROM likes WHERE post_id='$id' AND username='$userLoggedIn'");
				// if(mysqli_num_rows($like)){
				// 	$like_check = "unlike";

// //Prepare user_to string so it can be included even if not posted to a user
// 				if($row['user_to'] == "none" or $row['user_to'] == $userLoggedIn){
// 					$user_to ='';
// 				}
// 				else{
// 					$user_to_obj = new User($this->con, $row['user_to']);
// 					$user_to_name = $user_to_obj->getFirstAndLastName();
// 					$user_to = "to <a href='".$row['user_to']."'>".$user_to_name."</a>";
// 				}



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
							$time_message = $inverval->m." month".$days;
						} else{
							$time_message = $inverval->m." month".$days;
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
					$str .= "

					<div class='status_post' onClick='javascript:toggle$id(event)'>
													<div class='post_profile_pic'>
													<a href='$added_by'>
														<img class='profile_pic' src='$profile_pic' width='50'>
													</a>

													</div>
													<div class='posted_by' style='color:#ACACAC;'>
														<a href='$added_by'>
															$username
														</a>

</div>
													</div>
													<div class='post_body'>
														<p class='tetx_post'>$body</p>
														<br>

													</div>
													<div id='time'>
													$time_message
													</div>"	;

}

echo $str;
}

}
 ?>
