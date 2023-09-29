<?php
// Cek jika formulir telah dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa kredensial pengguna (gantilah ini dengan logika otentikasi yang sesuai)
    if ($username === 'user' && $password === 'password') {
        // Redirect ke halaman berhasil jika otentikasi berhasil
        header('Location: list-produk.php');
        exit();
    } else {
        // Tampilkan pesan kesalahan jika otentikasi gagal
        $error_message = 'Kredensial tidak valid. Silakan coba lagi.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Halaman Login</h2>
        <?php if (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
