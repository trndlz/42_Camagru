<?php

    require('model/usermanager.php');

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $db = new userManager();
        $login = htmlspecialchars($_POST["username"]);
        $password = hash("whirlpool", $_POST["password"]);
        $id_u = $db->loginUser($login, $password);
        if ($id_u == -1) {
            $_SESSION['message'] = 'You have to activate your account!';
            $_SESSION['message_type'] = 'failure';
            header("Location: index.php?action=login");
        } else if ($id_u > 0) {
            $_SESSION['user'] = $id_u;
            $_SESSION['message'] = 'Log-in successful';
            $_SESSION['message_type'] = 'success';
            header("Location: index.php"); 
        } else {
            $_SESSION['message'] = 'Log-in failed';
            $_SESSION['message_type'] = 'failure';
            header("Location: index.php?action=login");
        }
    }
?>

<div id="login_page">
    <h1 class="cam_titles">To access this page, please log-in first !</h1>
    <form action="" method="post" class="login_form" autocomplete="on">
        <input type="text" class="login_input" name="username" autocomplete="username"  placeholder="Enter your username" required>
        <input type="password" class="login_input" name="password" autocomplete="current-password" placeholder="Enter your password" required>
        <input type="submit" class="login_submit" value="Submit">
    </form>
    <p class="text">Not a member yet ? Register <a href="index.php?action=register" class="textlink">here</a></p>
    <p class="text">Forgot your password ? Click <a href="index.php?action=forgot" class="textlink">here</a> to reinitialize</p>
</div>