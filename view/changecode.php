<?php

	require('model/usermanager.php');
	
		$user = new userManager();
		$data = $user->getUserDataFromLogin($_SESSION['retreive']);

    if (isset($_SESSION['retreive']) && isset($_POST['password1']) && isset($_POST['password2']) && $_POST['password1'] != '' && $_POST['password2'] != '') {
		$pwd1 = hash("whirlpool", $_POST["password1"]);
		$pwd2 = hash("whirlpool", $_POST["password2"]);
		if ($pwd1 != $pwd2) {
			$_SESSION['message'] = 'Two passwords do not match';
			$_SESSION['message_type'] = 'failure';
			header("Location: index.php?action=changecode");
		}
		else {
			$user->updatePassFromLogin($pwd1, $_SESSION['retreive']);
			$_SESSION['message'] = 'New password succesfully changed';
			$_SESSION['message_type'] = 'success';
			unset($_SESSION['retreive']);
			header("Location: index.php");
		}
    }
?>

<div id="user_page">
	<h1 class="cam_titles">Give us your new password</h1>
	<script src="public/js/checkpw.js"></script>
	<form action="" method="post" class="login_form" autocomplete="off">
		<p class="user_field">Type your new password:</p>
		<input type="password" class="login_input" name="password1" id="password1" autocomplete="current-password" placeholder="Enter a new password (more than 8 characters)">
		<p class="user_field">Type your new password again:</p>
		<input type="password" class="login_input" name="password2" id="password2" autocomplete="current-password" placeholder="Enter your new password again" onkeyup="passCheck(); return false;">
		<span id="message_match"></span>
		<span id="length_match"></span>
		<input type="submit" class="login_submit" id="reg_submit" value="Submit new password">
	</form>
</div>