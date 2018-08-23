<?php

    require('model/usermanager.php');

    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['login']) && isset($_POST['password1']) && isset($_POST['password2'])) {
        $db = new userManager();
        $fullname = htmlspecialchars($_POST["fullname"]);
        $email = htmlspecialchars($_POST["email"]);
        $login = htmlspecialchars($_POST["login"]);
        $password1 = hash("whirlpool", $_POST["password1"]);
        $password2 = hash("whirlpool", $_POST["password2"]);
        $code = substr(md5(mt_rand()), 0, 15);
        if ($db->loginExists($login) > 0) {
            $_SESSION['message'] = 'This login already exists, please try-again';
            $_SESSION['message_type'] = 'failure';
            header("Location: ?action=register");
            exit ;
        }
        if ($password1 != $password2) {
            $_SESSION['message'] = 'Two passwords do not match, please try-again';
            $_SESSION['message_type'] = 'failure';
            header("Location: ?action=register");
            exit ;
        }
        $db->newUser($fullname, $email, $login, $password1);
        $_SESSION['message'] = 'Your account has been successfully created ! You will receive an activation email in a few seconds';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }
?>

<div id="register_page">
    <h1 class="cam_titles">Register to cama&hearts;green !</h1>
    <script src="public/js/checkpw.js"></script>
    <form action="" method="post" class="login_form" autocomplete="on">
        <input type="text" class="login_input" name="fullname" autocomplete="fullname"  placeholder="Enter your full name" required>
        <input type="text" class="login_input" name="email" autocomplete="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter your email" required>
        <input type="text" class="login_input" name="login" autocomplete="login" placeholder="Enter your login" required>
        <input type="password" class="login_input" name="password1" id="password1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" autocomplete="current-password" placeholder="Enter your password (more than 8 characters)" required>
        <input type="password" class="login_input" name="password2" id="password2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" autocomplete="current-password" placeholder="Enter your password again" onkeyup="passCheck(); return false;" required>
        <span id="message_match"></span>
        <span id="length_match"></span>
        <input type="submit" class="login_submit" id="reg_submit" disabled="true" value="Welcome !">
    </form>
</div>
