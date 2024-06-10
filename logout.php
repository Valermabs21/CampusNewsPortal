<?php

session_start();

if (isset($_SESSION['campusportal_userid'])) {

    $_SESSION['campusportal_userid'] = NULL;
    unset($_SESSION['campusportal_userid']);

    
}

header("Location: login.php");
die;