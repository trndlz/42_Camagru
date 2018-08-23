<?php

    require('model/usermanager.php');

    if (isset($_POST['login'])) {
        $db = new userManager();
        $login = htmlspecialchars($_POST["login"]);
        if ($db->sendRecoveryMail($login) == 1) {
            $_SESSION['message'] = 'Recovery email has been sent !';
            $_SESSION['message_type'] = 'success';
            header("Location: index.php");
        } else {
            $_SESSION['message'] = 'This user does not exist !';
            $_SESSION['message_type'] = 'failure';
            header("Location: ?action=forgot");
        }     
    }
?>

<div id="register_page">
    <h1 class="cam_titles">Retreive your password !</h1>
    <form action="" method="post" class="login_form" autocomplete="on">
        <input type="text" class="login_input" name="login" autocomplete="login" placeholder="Enter your login" required>
        <input type="submit" class="login_submit" id="reg_submit" value="Send recovery email">
    </form>
</div>
