<?php
session_start();
include('database.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['campusportal_userid']; // Assuming user ID is stored in the session
    $comment = htmlspecialchars($_POST['comment']);

    if (!empty($comment)) {
        $stmt = $con->prepare("INSERT INTO admin_comments (post_id, user_id, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $post_id, $user_id, $comment);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: Administration.php");
    exit();
}
?>
