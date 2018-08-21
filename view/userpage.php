<?php

    require('model/usermanager.php');

    $user = new userManager();
    $data = $user->getUserData($_SESSION['user']);

	if (isset($_POST['old_password']) && isset($_POST['email']) && isset($_POST['login'])) {
		$new = htmlspecialchars($_POST['login']);
		if ($_POST['login'] != $data[0]['login'] && $user->loginExists($new) != 0) {
			header("Location: index.php?action=userpage&message=Login already exists&message_type=failure");
		}
		else {
			$pwdhash = hash("whirlpool", $_POST["old_password"]);
			$id = $user->loginUserId($_SESSION['user'], $pwdhash);
	        if ($user->loginUserId($_SESSION['user'], $pwdhash) != 0) {
				if (isset($_POST['password1']) && isset($_POST['password2']) && $_POST['password1'] != '' && $_POST['password2'] != '') {
					$pwd1 = hash("whirlpool", $_POST["password1"]);
					$pwd2 = hash("whirlpool", $_POST["password2"]);
					if ($pwd1 != $pwd2) {
						header("Location: index.php?action=userpage&message=Two passwords do not match&message_type=failure");
					}
					else {
						$user->updateEmail($_POST['email'], $_SESSION['user']);
						$user->updateLogin($_POST['login'], $_SESSION['user']);
						$user->updatePass($pwd1, $_SESSION['user']);
						$data = $user->getUserData($_SESSION['user']);
						header("Location: index.php?action=userpage&message=User information successfully changed&message_type=success");
					}
				} else {
					$user->updateEmail($_POST['email'], $_SESSION['user']);
					$user->updateLogin($_POST['login'], $_SESSION['user']);
					$data = $user->getUserData($_SESSION['user']);
					header("Location: index.php?action=userpage&message=User information successfully changed&message_type=success");
				}
				$data = $user->getUserData($_SESSION['user']);
				header("Location: index.php?action=userpage&message=User information successfully changed&message_type=success");
	        } else {
	            header("Location: index.php?action=userpage&message=Wrong password&message_type=failure");
	        }
		}

    }

?>
<h1 class="cam_titles">Want to change your personal data ?</h1>
<script src="public/js/checkpw.js"></script>
<form action="" method="post" class="login_form" autocomplete="off">
    <p>Change your email:</p>
    <input type="text" class="login_input" value="<?=$data[0]['mail']; ?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter a new email">
    <p>Change your login:</p>
    <input type="text" class="login_input" value="<?=$data[0]['login']; ?>" name="login" autocomplete="login" placeholder="Enter a new login">
    <p>Type your old password:</p>
    <input type="password" class="login_input" name="old_password" id="old_password" autocomplete="current-password" placeholder="Enter your old password" required>
    <p>Type your new password:</p>
    <input type="password" class="login_input" name="password1" id="password1" autocomplete="current-password" placeholder="Enter a new password (more than 8 characters)">
    <p>Type your new password again:</p>
    <input type="password" class="login_input" name="password2" id="password2" autocomplete="current-password" placeholder="Enter your new password again" onkeyup="passCheck(); return false;">
    <span id="message_match"></span>
    <span id="length_match"></span>
    <input type="submit" class="login_submit" id="reg_submit" value="Change your data !">
</form>
