<?php

    if(($_SESSION['user']))
    {
        unset($_SESSION['user']);
    }
    
    session_destroy();
    header("location:".'http://localhost/ju_transport_system/'.'login.php');
?>