<?php

class Controller {

    public function loadModel()
    {
        // Display messages
        if (isset($_GET['message']) && isset($_GET['message_type']))
        {
            if ($_GET['message_type'] == "success")
                echo "<div id='success'>";
            else
                echo "<div id='failure'>";
            echo $_GET['message'];
            echo "</div>";
        }
        // By default, display all photos
        if (!isset($_GET['action']) && empty($_GET['action'])) {
            require('model/photosmanager.php');
            require('view/viewphotos.php');
            $db = new photosManager();
            $photos = $db->getAllPhotos();
            displayPhotos($photos);
        }
        // All other available pages for un-registered users
        else if ($_GET['action'] == 'login') {
            require('view/login.php');
        } else if ($_GET['action'] == 'register') {
            require('view/register.php');
        } else if ($_GET['action'] == 'activate') {
            require('view/activate.php');
        }
        else
        {
            // Session check
            if (isset($_SESSION['user'])) {
                // Add photos with webcam / upload
                if ($_GET['action'] == 'add') {
                    require('view/addphotos.php');
                }
                if ($_GET['action'] == 'logout') {
                    require('view/logout.php');
                }
            }
            else {
                require('view/login.php');
            }
        }
    }
}

?>