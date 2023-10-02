<?php
session_start();

// Hapus semua data sesi
session_destroy();

// Redirect kembali ke halaman login
header("Location: index.php");
exit;
?>
