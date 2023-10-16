<?php
session_start();
require('../../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username is already taken
    $checkUsernameQuery = "SELECT id FROM users WHERE username = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    if (mysqli_num_rows($checkUsernameResult) > 0) {
        header('Location: register.php?error=1');
        exit;
    }

    $query = "INSERT INTO users (name, email, username, password, group_id) VALUES ('$name', '$email', '$username', MD5('$password'), 1)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registration successful, redirect to login page
        header('Location: ../../index.php');
    } else {
        // Registration failed, redirect back to register page
        header('Location: register.php?error=1');
    }
}
?>
