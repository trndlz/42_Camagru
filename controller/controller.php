<?php

class Controller {

    public function loadModel()
    {
        // Display messages
        if (isset($_SESSION['message']) && isset($_SESSION['message_type']))
        {
            if ($_SESSION['message_type'] == "success")
                echo "<div id='success'>";
            else
                echo "<div id='failure'>";
            echo $_SESSION['message'];
            echo "</div>";
            unset($_SESSION['message_type']);
            unset($_SESSION['message']);
        }
        // By default, display all photos
        if (!isset($_GET['action']) && empty($_GET['action'])) {
            require('view/viewphotos.php');
        }
        // All other available pages for un-registered users
        else if ($_GET['action'] == 'login') {
            require('view/login.php');
        } else if ($_GET['action'] == 'register') {
            require('view/register.php');
        } else if ($_GET['action'] == 'activate') {
            require('view/activate.php');
        } else if ($_GET['action'] == 'forgot') {
            require('view/forgot.php');
        } else if ($_GET['action'] == 'retreive') {
            require('view/retreive.php');
        } else if ($_GET['action'] == 'changecode') {
            require('view/changecode.php');
        }
        else
        {
            // Only for logged-in users
            if (isset($_SESSION['user'])) {
                if ($_GET['action'] == 'add') {
                    require('view/addphotos.php');
                }
                if ($_GET['action'] == 'userpage') {
                    require('view/userpage.php');
                }
                if ($_GET['action'] == 'upload') {
                    require('view/uploadphoto.php');
                }
                if ($_GET['action'] == 'logout') {
                    require('view/logout.php');
                }
				if ($_GET['action'] == 'comment' && isset($_GET['id'])) {
                    require('view/commentphoto.php');
                }
            }
            else {
                require('view/login.php');
            }
        }
    }
}

?>
