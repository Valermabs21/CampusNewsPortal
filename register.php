<?php

include("classes/connect.php");
include("classes/register.php");

$username = "";
$email = "";
$site = "";
$contact_number = "";
$department = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $register = new Register();
    $result = $register->evaluate($_POST);

    if ($result != "") {
        echo "<script>alert('".$result."');</script>";
    } else {
        header("Location: login.php");
        die;
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    $contact_number = $_POST['contact_number'];
    $department = $_POST['department'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

.registration-form-container {
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
    <div class="registration-form-container">
        <form method="post" action="">
            <h2>Registration</h2><br>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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
                <label for="site">Role:</label>
                <select id="site" name="site" required>
                    <option value="">Select a role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-field">
                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contact_number" pattern="[0-9]{10}" required>
            </div>
            <div class="form-field">
                <label for="department">Department:</label>
                <select id="department" name="department" required>
                    <option value="">Select a department</option>
                    <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                    <option value="College of Engineering and Technology">College of Engineering and Technology</option>
                    <option value="College of Agriculture">College of Agriculture</option>
                    <option value="Administration">Administration</option>
                    <option value="Office of Student Affairs">Office of Student Affairs</option>
                    <option value="University Students Government">University Students Government</option>
                    <option value="Information and Communications Technology">Information and Communications Technology</option>
                </select>
            </div>
            <div class="form-field">
                <input type="submit" value="Register">
            </div>
        </form>

        <br>

        <div class="login-link">
            <a href="login.php" style="color: black; text-decoration: none;">Already had an account? Login.</a>
        </div>
    </div>

</body>
</html>
