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

          }
        }
  }
  //   //if whitespace(1 or more together) split with whitespace)
	// 		$body_array =  preg_split("/\s+/", $body);
  //
	// 		foreach($body_array as $key => $value){
  //
	// 			if(strpos($value, "www.youtube.com/watch?v=") !== false){
  //
	// 				$link = preg_split("!&!", $value); // if video is in youtube playlist
	// 				$value =  preg_replace("!watch\?v=!", "embed/", $value);
	// 				$value = "<br><iframe width=\'420\' height=\'315\' src=\'".$value."\'></iframe><br>";
	// 				//add this iframe value in key&value of $body_array
	// 				$body_array[$key] = $value;
	// 			}
  //
	// 		}
  //
	// 		//if there is no iframe(youtube) it doesn't matter
	// 		$body = implode(" ", $body_array);
  //
  //
	// 		//Get username
	// 		$added_by = $this->user_obj->getUsername();
  //
	// 		//If user is on own profile, user_to is 'none'
	// 		if($user_to == $added_by){
	// 			$user_to == 'none';
	// 		}
  //
  //
  //
	// 		//Insert notification
	// 		if($user_to != 'none'){ // except for case when user posted userself
	// 			$notification = new Notification($this->con, $added_by);
	// 			$notification->insertNotification($returned_id, $user_to, "profile_post");
	// 		}
  //   }
  // }


 ?>
