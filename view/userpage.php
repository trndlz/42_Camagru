<?php
    require('model/usermanager.php');

    $user = new userManager();
    $data = $user->getUserData($_SESSION['user']);

?>
<h1 class="cam_titles">Want to change your personal data ?</h1>
<form action="" method="post" class="login_form" autocomplete="off">
    <p>Change your email:</p>
    <input type="text" class="login_input" value="<?=$data[0]['mail']; ?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter a new email">
    <p>Change your login:</p>
    <input type="text" class="login_input" value="<?=$data[0]['login']; ?>" name="login" autocomplete="login" placeholder="Enter a new login">
    <p>Type your old password:</p>
    <input type="password" class="login_input" name="old_password" id="old_" autocomplete="current-password" placeholder="Enter your old password" required>
    <p>Type your new password:</p>
    <input type="password" class="login_input" name="password1" id="password1" autocomplete="current-password" placeholder="Enter a new password (more than 8 characters)">
    <p>Type your new password again:</p>
    <input type="password" class="login_input" name="password2" id="password2" autocomplete="current-password" placeholder="Enter your new password again" onkeyup="passCheck(); return false;">
    <span id="message_match"></span>
    <span id="length_match"></span>
    <input type="submit" class="login_submit" id="reg_submit" disabled="true" value="Welcome !">
</form>