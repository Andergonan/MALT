<?php
    session_start();
    // destroy session
    if(session_destroy()) {
        // redirecting to login page
        header("Location:login.php");
    }
?>