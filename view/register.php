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
            header("Location: ?action=register&message=This login already exists, please try-again&message_type=failure");
            exit ;
        }
        if ($password1 != $password2) {
            header("Location: ?action=register&message=Two passwords do not match, please try-again&message_type=failure");
            exit ;
        }
        $db->newUser($fullname, $email, $login, $password1);
        header("Location: ?message=Your account has been successfully created ! You will receive an activation email in a few seconds&message_type=success");
    }
?>

<script type="text/javascript">
function hideAndShowDiv() {
    var x = document.getElementById('login_page');
    x.style.display = 'none';
    var y = document.getElementById('register_page');
    y.style.display = 'flex';
}

</script>
<h1 class="cam_titles">Register to cama&hearts;green !</h1>
<script src="public/js/checkpw.js"></script>
<form action="" method="post" class="login_form" autocomplete="on">
    <input type="text" class="login_input" name="fullname" autocomplete="fullname"  placeholder="Enter your full name" required>
    <input type="text" class="login_input" name="email" autocomplete="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter your email" required>
    <input type="text" class="login_input" name="login" autocomplete="login" placeholder="Enter your login" required>
    <input type="password" class="login_input" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="password1" id="password1" autocomplete="current-password" placeholder="Enter your password (more than 8 characters)" required>
    <input type="password" class="login_input" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="password2" id="password2" autocomplete="current-password" placeholder="Enter your password again" onkeyup="passCheck(); return false;" required>
    <span id="message_match"></span>
    <span id="length_match"></span>
    <input type="submit" class="login_submit" id="reg_submit" disabled="true" value="Welcome !">
</form>
