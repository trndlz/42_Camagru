<?php
    $_SESSION = array();
    session_destroy();
    $_SESSION['message'] = 'Log-out successful';
	$_SESSION['message_type'] = 'success';
    header("Location: index.php");
?>