<?php
class User {
	private $user;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
		$this->user = mysqli_fetch_array($user_details_query);
	}

	public function getUsername() {
		return $this->user['username'];
	}

	public function getNumPosts() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT num_posts FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['num_posts'];
	}

	public function getFirstAndLastName() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}

	public function isClosed() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT user_closed FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);

		if($row['user_closed'] == 'yes')
			return true;
		else
			return false;
	}


		public function getProfilePic(){
			$username = $this->user['username'];
			$query = mysqli_query($this->con, "SELECT profile_pic FROM users WHERE username='$username'");
			$row = mysqli_fetch_array($query);
			return $row['profile_pic'];
		}



	public function isFollowing($username_to_check){
			$usernameComma = ",".$username_to_check.",";

			// if usernameComma is in user['friend_array'] or $username_to_check is you
			if((strstr($this->user['follow_array'], $usernameComma) || $username_to_check == $this->user['username'])){
				return true;
			} else{
				return false;
			}
		}

		public function follow($user_to_follow){
		$user_from = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT followers FROM users WHERE username='$user_to_follow'");
		$row = mysqli_fetch_array($query);
		$friend_array_username = $row['followers'];

		$query2 = mysqli_query($this->con, "SELECT follow_array FROM users WHERE username='$user_from'");
		$row2 = mysqli_fetch_array($query2);
		$friend_array_username_get = $row2['follow_array'];

		// make new array what replace user to blank in my friend_array
		$new_friend_array = $row2['follow_array'] .$user_to_follow.",";
		$remove_friend = mysqli_query($this->con, "UPDATE users SET follow_array='$new_friend_array' WHERE username='$user_from'");

		// make new array what replace user to blank in this friend_array
		$new_friend_array = $row['followers'] .$this->user['username'].",";
		$remove_friend = mysqli_query($this->con, "UPDATE users SET followers='$new_friend_array' WHERE username='$user_to_follow'");
	}

		public function removeFriend($user_to_remove){
		$logged_in_user = $this->user['username'];

		$query = mysqli_query($this->con, "SELECT follow_array FROM users WHERE username='$user_to_remove'");
		$row = mysqli_fetch_array($query);
		$friend_array_username = $row['follow_array'];

		// make new array what replace user to blank in my friend_array
		$new_friend_array = str_replace($user_to_remove.",", "", $this->user['follow_array']);
		$remove_friend = mysqli_query($this->con, "UPDATE users SET follow_array='$new_friend_array' WHERE username='$logged_in_user'");

		// make new array what replace user to blank in this friend_array
		$new_friend_array = str_replace($this->user['username'].",", "", $friend_array_username);
		$remove_friend = mysqli_query($this->con, "UPDATE users SET followers='$new_friend_array' WHERE username='$user_to_remove'");
	}


}

?>
