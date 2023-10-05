<?php
// informasi akun statis
$static_username = "rizkidian";
$static_password = "123";

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Periksa apakah username atau password kosong
if (empty($username) || empty($password)) {
    header("Location: login.php?error=2"); // Parameter error=2 untuk pesan kesalahan form kosong
    exit();
}

// Cek apakah username dan password sesuai dengan akun statis
if ($username === $static_username && $password === $static_password) {
    // Autentikasi berhasil, mengarah ke dashboard
    header("Location: ../pages/dashboard.php");
    exit();
} else {
    // Autentikasi gagal, kembali ke halaman login
    header("Location: login.php?error=1");
    exit();;
}
?>
