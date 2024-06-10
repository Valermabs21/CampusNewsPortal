<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'campusportal_db';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password != $confirm_password) {
        $error = "Passwords do not match";
    } else {
       
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = '$password' WHERE username = '$username'";
        $result = $conn->query($query);

        if ($result) {
            $success = "Password reset successfully";
            echo "<script>alert('Password reset successfully!');</script>";
            header("Location: login.php");
            exit;
        } else {
            $error = "Error resetting password: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.background-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('image/CLAVERIA02 (1).jpg');
    background-size: cover;
    background-position: center;
    opacity: 1;
    z-index: -1;
}

.forgot-password-form-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    width: 300px;
    text-align: center;
}

.form-field {
    margin-bottom: 15px;
}

.form-field label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
}

.form-field input[type="text"],
.form-field input[type="password"],
.form-field input[type="submit"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-field input[type="submit"] {
    background-color: #1A1851;
    color: white;
    border: none;
    cursor: pointer;
}

.form-field input[type="submit"]:hover {
    background-color: #0056b3;
}

.register-link {
    margin-top: 15px;
    text-align: center;
}

.register-link a {
    color: black;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}
</style>
<body>
    <div class="background-image"></div>
    <div class="forgot-password-form-container">
        <form action="" method="post" class="forgot-password-form">
            <h2>Forgot Password</h2>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-field">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm_password" required>
            </div>
            <div class="form-field">
                <input type="submit" value="Reset">
            </div>
        </form>
        <div class="register-link">
            <a href="login.php" style="color: black;">Back to Login</a>
        </div>
    </div>
</body>
</html>
