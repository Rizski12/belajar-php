<?php
session_start();
require('../../config/koneksi.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = $phone_number;

    $checkUsernameQuery = "SELECT id FROM users WHERE username = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    if (mysqli_num_rows($checkUsernameResult) > 0) {
        header('Location: register.php?error=1');
        exit;
    }

    $query = "INSERT INTO users (name, email, phone_number, username, password, group_id) VALUES ('$name', '$email', '$phone_number', '$username', MD5('$password'), 3)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registrasi berhasil maka akan di arahkan ke halaman login
        header('Location: ../../index.php');
    } else {
        // Registrasi gagal akan di arahkan ke halaman register dan menampilkan pesan error
        header('Location: register.php?error=2');
    }
}
?>
