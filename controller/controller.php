<?php

session_start();

class Controller {

    public function loadModel()
    {
        // By default, display all photos
        if (!isset($_GET['action']) && empty($_GET['action'])) {
            require('model/photosmanager.php');
            require('view/viewphotos.php');
            $db = new photosManager();
            $photos = $db->getPhotos();
            displayPhotos($photos);
        }
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
                if ($_GET['action'] == 'add') {
                    require('view/addphotos.php');
                }
            }
            else {
                require('view/login.php');
            }
        }
    }
}

?>