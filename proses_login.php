<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['username'])) {
    header("Location: pages/listing-produk.php");
    exit;
}

// Cek apakah formulir login dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = "rizkidian";
    $password = "123";

    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Jika sesuai, set session dan arahkan ke halaman produk.php
        $_SESSION['username'] = $username;
        header("Location: pages/listing-produk.php");
        exit;
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }
}
?>
