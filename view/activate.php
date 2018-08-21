<?php

    require('model/usermanager.php');

    if (isset($_GET['code']) && isset($_GET['login'])) {
        $db = new userManager();
        if ($db->checkVerifCode($_GET['login'], $_GET['code']) == 1) {
            header("Location: ?action=login&message=Accound activated ! You can now login&message_type=success");
        } else {
            header("Location: ?action=login&message=Wrong activation code given :(&message_type=failure");
        }
    }
?>