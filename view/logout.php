<?php
    $_SESSION = array();
    session_destroy();
    header("Location: ?message=Log-out successful&message_type=success");
?>