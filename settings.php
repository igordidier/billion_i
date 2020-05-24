<?php
include_once ("includes/header.php");
include_once ("includes/form_handlers/settings_handler.php");
?>

<script>
	function openFileInput(){
    	$("#picture").click();
	}
</script>

<div class='main_column column'>

	<h4>Account Settings</h4>
	<a href="upload.php" onclick="openFileInput();">
		<?php
		echo "<img src='".$user['profile_pic']."' id='small_profile_pic'>";
		?>
		<br>
		<p style="text-align:center;">Upload new profile picture</p>
	</a>
	<br><br><br>


	<h4>Modify the values and click 'Update Details'</h4>

	<?php
	$user_data_query = mysqli_query($con, "SELECT first_name, last_name, username, email, bio FROM users WHERE username='$userLoggedIn'");
	$row = mysqli_fetch_array($user_data_query);

  $username = $row['username'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	$about = $row['bio'];
	?>

	<form action="settings.php" method="POST">
		Username: <input type='text' name='username' value="<?php echo $username; ?>" class="settings_input"><br>
		First Name: <input type='text' name='first_name' value="<?php echo $first_name; ?>" class="settings_input"><br>
		Last Name: <input type='text' name='last_name' value="<?php echo $last_name; ?>" class="settings_input"><br>
		Email: <input type='text' name='email' value="<?php echo $email; ?>" class="settings_input"><br>
		About: <textarea type="text" name="about" value="<?php echo $about; ?>" class="settings_input" maxlength="255" style="height: 100px;"><?php echo $about; ?></textarea><br>

		<?php echo $message; ?>

		<input type="submit" name="update_details" id="save_detail" value="Update Details" class="info settings_submit"><br>
	</form>

	<h4>Change Password</h4>
	<form action="settings.php" method="POST">
		Old Password: <input type='password' name='old_password' class="settings_input"><br>
		New Password: <input type='password' name='new_password_1' class="settings_input"><br>
		New password Again: <input type='password' name='new_password_2' class="settings_input"><br>

		<?php echo $password_message; ?>

		<input type="submit" name="update_password" id="save_details" value="Update Password" class="info settings_submit"><br>
	</form>

	<!-- <h4>Close Account</h4>
	<form action="settings.php" method="POST">
		<input type="submit" name="close_account" id="close_account" value="Close Account" class="danger settings_submit">
	</form> -->

</div>
