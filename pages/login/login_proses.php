<?php
session_start();
require('../../config/koneksi.php');
require('class_login.php');

$db = new Database();
$login = new Login($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah login berhasil
    if ($login->loginUser($username, $password)) {
        // Jika login berhasil, arahkan ke halaman dashboard
        header('Location: ../dashboard/dashboard.php');
    } else {
        // Jika login tidak valid, arahkan kembali ke halaman login dengan pesan error
        header('Location: ../../index.php?error=1');
    }
}
?>
