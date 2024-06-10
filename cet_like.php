<?php

session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/cet_post.php");
include('classes/image.php');

if (isset($_SESSION['campusportal_userid']) && is_numeric($_SESSION['campusportal_userid'])) {

    $id = $_SESSION['campusportal_userid'];
    $login = new Login();

    $result = $login->check_login($id);

    if ($result) {

        $user = new User();
        $user_data = $user->get_data($id);

        if (!$user_data) {
            header('Location: login.php');
            die;
        }

    } else {
        header('Location: login.php');
        die;
    }
} else {
    header('Location: login.php');
    die;
}

if (isset($_SERVER['HTTP_REFERER'])) {
    $return_to = $_SERVER['HTTP_REFERER'];
} else {
    $return_to = "College of Engineering and Technology.php";
}

if (isset($_GET['type']) && isset($_GET['id'])) { 

    if (is_numeric($_GET['id'])) {
        
        $allowed = ['post', 'comment']; // Simplified array creation

        if (in_array($_GET['type'], $allowed)) {
            $post = new Post();
            $post->like_post($_GET['id'], $_GET['type'], $_SESSION['campusportal_userid']);
        }
    }
}

header("Location: " . $return_to);
die;

?>
