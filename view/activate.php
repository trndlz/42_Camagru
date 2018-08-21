<?php

    require('model/usermanager.php');

    if (isset($_GET['code']) && isset($_GET['login'])) {
        $db = new userManager();
        if ($db->checkVerifCode($_GET['login'], $_GET['code']) == 1) {
            echo "<p>Compte activé</p>";
        } else {
            echo "<p>Compte pas activé</p>";
        }
    }
?>