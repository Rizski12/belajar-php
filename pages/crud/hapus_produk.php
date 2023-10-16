<?php
include '../../config/koneksi.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: crud_produk.php");
    } else {
        echo "<script>alert('Data produk gagal dihapus!'); window.location.href='crud_produk.php'</script>";
    }
} else {
    echo "<script>alert('ID produk tidak valid.'); window.location.href='crud_produk.php'</script>";
}
?>
