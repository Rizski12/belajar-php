<?php
session_start();
require('../../config/koneksi.php');
require('class_register.php');

$db = new Database();
$register = new Register($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Memanggil fungsi registrasi
    $result = $register->registerUser($name, $email, $phone_number, $password);

    if ($result === true) {
        // Registrasi berhasil, arahkan ke halaman login
        header('Location: ../../index.php');
    } elseif ($result === false && $register->isPhoneNumberUsed($phone_number)) {
        // Nomor telepon sudah digunakan, arahkan kembali ke halaman register dengan pesan error
        header('Location: register.php?error=1');
    } else {
        // Registrasi gagal, arahkan kembali ke halaman register dengan pesan error
        header('Location: register.php?error=2');
    }
}

?>