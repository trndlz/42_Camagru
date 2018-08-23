<?php

    require('model/usermanager.php');

    if (isset($_GET['code']) && isset($_GET['login'])) {
        $db = new userManager();
        if ($db->checkVerifCode($_GET['login'], $_GET['code']) == 1) {
            $_SESSION['retreive'] = $_GET['login'];
            header("Location: index.php?action=changecode");
        } else {
            $_SESSION['message'] = 'Wrong password initialization code given :(';
            $_SESSION['message_type'] = 'failure';
            header("Location: index.php?action=login");
        }
    }
?>

<div id="user_page">
	<h1 class="cam_titles">Give us your new password</h1>
	<script src="public/js/checkpw.js"></script>
	<form action="" method="post" class="login_form" autocomplete="off">
		<p class="user_field">Change your email:</p>
		<input type="text" class="login_input" value="<?=$data[0]['mail']; ?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter a new email">
		<p class="user_field">Change your login:</p>
		<input type="text" class="login_input" value="<?=$data[0]['login']; ?>" name="login" autocomplete="login" placeholder="Enter a new login">
		<p class="user_field">Type your old password:</p>
		<input type="password" class="login_input" name="old_password" id="old_password" autocomplete="current-password" placeholder="Enter your old password" required>
		<p class="user_field">Type your new password:</p>
		<input type="password" class="login_input" name="password1" id="password1" autocomplete="current-password" placeholder="Enter a new password (more than 8 characters)">
		<p class="user_field">Type your new password again:</p>
		<input type="password" class="login_input" name="password2" id="password2" autocomplete="current-password" placeholder="Enter your new password again" onkeyup="passCheck(); return false;">
		<p class="user_field">
			<input class="checkbox" type="checkbox" <?php if ($data[0]['notification'] == 1) { echo 'checked="checked"'; } ?> name="notif">Enable notifications on comments
		</p>
		<span id="message_match"></span>
		<span id="length_match"></span>
		<input type="submit" class="login_submit" id="reg_submit" value="Change your data !">
	</form>
</div>