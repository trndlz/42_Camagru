<?php

    require('model/usermanager.php');

    if (isset($_GET['code']) && isset($_GET['login'])) {
        $db = new userManager();
        if ($db->checkVerifCode($_GET['login'], $_GET['code']) == 1) {
            $_SESSION['message'] = 'Accound activated ! You can now login';
            $_SESSION['message_type'] = 'success';
            header("Location: index.php?action=login");
        } else {
            $_SESSION['message'] = 'Wrong activation code given :(';
            $_SESSION['message_type'] = 'failure';
            header("Location: index.php?action=login");
        }
    }
?>