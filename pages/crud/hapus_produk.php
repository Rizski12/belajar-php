<?php
// Masukkan kode koneksi ke database di sini
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos_shop";

// Membuat objek koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message2'] = "Data produk berhasil dihapus.";
        header("Location: index.php");
    } else {
        echo "<script>alert('Data produk gagal dihapus!'); window.location.href='crud_produk.php'</script>";
    }
} else {
    echo "<script>alert('ID produk tidak valid.'); window.location.href='crud_produk.php'</script>";
}
?>
