<?php
session_start();
include("classes/connect.php");
include("classes/login.php");

$username = "";
$password = "";
$site = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $login = new Login();
    $result = $login->evaluate($_POST);

    if ($result != "") {
        echo "<script>alert('".$result."');</script>";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $site = $_POST['site'];
        $email = $_POST['email'];

        if ($_POST['otp'] == $_SESSION['otp']) {
            header("Location: index.php");
            die;
        } else {
            echo "<script>alert('Invalid OTP. Please try again.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

.login-form-container {
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
}

.form-field input,
.form-field select,
.form-field button {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-field button {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

.form-field button:hover {
    background-color: #0056b3;
}

.register-link, .forgot-password {
    margin-top: 15px;
}

.register-link a, .forgot-password a {
    color: black;
    text-decoration: none;
}

.register-link a:hover, .forgot-password a:hover {
    text-decoration: underline;
}

</style>
<body>
    <div class="background-image"></div>
    <div class="login-form-container">
        <form method="post" id="login-form">
            <h2>Login</h2><br>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-field">
                <label for="site">Role:</label>
                <select id="site" name="site" required>
                    <option value="">Select a role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-field">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" required>
                <button type="button" id="get-otp-btn">Get OTP</button>
            </div>
            <div class="form-field">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <div class="register-link">
            <a href="register.php" style="color: black;">Do not have an account? Register</a>
        </div>
        <br>
        <div class="forgot-password">
            <a href="forgot_password.php" style="color: black; text-decoration: none;">Forgot Password?</a>
        </div>
    </div>
    <script>
        document.getElementById('get-otp-btn').addEventListener('click', function() {
            var email = document.getElementById('email').value;
            if (email) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'otp.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                    }
                };
                xhr.send('email=' + encodeURIComponent(email));
            } else {
                alert('Please enter your email address.');
            }
        });
    </script>
</body>
</html>
