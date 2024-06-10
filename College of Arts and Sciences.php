<?php
session_start();

include("database.php");
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/cas_post.php");
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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($user_data['site'] == 'admin' && $user_data['department'] == 'College of Arts and Sciences') {
        $post = new Post();
        $id = $_SESSION['campusportal_userid'];
        $result = $post->create_post($id, $_POST, $_FILES);

        if ($result == "") {
            header("Location: College of Arts and Sciences.php");
            die;
        } else {
            echo $result;
        }
    } else {
        echo "Only admins of the College of Arts and Sciences are allowed to post.";
    }
}

$post = new Post();
$id = $_SESSION['campusportal_userid'];
$posts = $post->get_posts($id);

$image_class = new Image();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus News Portal</title>
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0" nonce="hEpJ2Dd7"></script>
   
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .button-row {
            display: flex;
            align-items: center;
        }

        .button-row a,
        .button-row span {
            margin: 0 5px;
        }

        #post {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .comments-section {
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .comments-section h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #405d9b;
        }

        .comment {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .comment-author {
            font-weight: bold;
            color: #333;
        }

        .comment-text {
            margin-top: 5px;
            color: #555;
        }

        .comment-date {
            margin-top: 5px;
            font-size: 12px;
            color: #999;
        }

        .comment-form {
            margin-top: 20px;
        }

        .comment-form textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }

        .comment-form button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #405d9b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #334a7d;
        }

        .posting-area {
            margin-top: 20px;
            padding: 25px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .posting-area textarea {
            width: 95%;
            height: 80px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
            margin-bottom: 10px;
        }

        .posting-area input[type="file"] {
            margin-top: 10px;
        }

        .posting-area input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #405d9b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .posting-area input[type="submit"]:hover {
            background-color: #334a7d;
        }
    </style>
</head>
<body>
<div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#Colleges">Colleges</a>
                <div class="dropdown-content">
                    <a href="College of Arts and Sciences.php">College of Arts and Sciences</a>
                    <a href="College of Engineering and Technology.php">College of Engineering and Technology</a>
                    <a href="College of Agriculture.php">College of Agriculture</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#Updates">Updates</a>
                <div class="dropdown-content">
                    <a href="Administration.php">Administration</a>
                    <a href="Office of Student Affairs.php">Office of Student Affairs</a>
                    <a href="University Students Government.php">University Students Government</a>
                    <a href="Information and Communications Technology.php">Information and Communications Technology</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#About">About</a>
                <div class="dropdown-content">
                    <a href="Creators.php">Creators</a>
                    <a href="Contact Us.php">Contact Us</a>
                </div>
            </li>
            <li class="logout-btn"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</div>
<div class="container">
    <div class="left-sidebar"></div>

    <div class="main-content">
        <div class="write-post-container">
            <div class="main">
                <h1>Welcome to College of Arts and Sciences</h1>
                <p>Stay updated with the latest campus news and updates.</p>
            </div>
        </div>
        <div class="posting-area">
                
                <?php if ($user_data['site'] == 'admin' && $user_data['department'] == 'College of Arts and Sciences'): ?>
                    <form method="post" enctype="multipart/form-data">
                        <textarea name="post" placeholder="What's on your mind?"></textarea>
                        <input type="file" name="file">
                        <input id="post_button" type="submit" value="Post">
                        <br>
                    </form>
                <?php else: ?>
                    <p>Only admins of the College of Arts and Sciences are allowed to post.</p>
                <?php endif; ?>

            </div>
            <div id="post_bar">

                <?php
                if ($posts) {
                    foreach ($posts as $ROW) {
                        $user = new User();
                        $ROW_USER = $user->get_user($ROW['userid']);
                        include("cas_post.php");
                    }
                }
                ?>

            </div>
        </div>
        <div></div>
    </div>
    <div class="right-sidebar"></div>
</div>

<footer>
    <p>Copyright &copy; 2024 Campus News Portal</p>
    <p>DISCLAIMER: This site is for educational purposes only. All rights reserved.</p>
</footer>
</body>

<script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1171867143967266',
                cookie     : true,
                xfbml      : true,
                version    : 'v20.0'
            });

            FB.AppEvents.logPageView();   
        };

        function shareOnFacebook(postUrl) {
            FB.ui({
                method: 'share',
                href: postUrl,
            }, function(response){});
        }
    </script>

</html>
