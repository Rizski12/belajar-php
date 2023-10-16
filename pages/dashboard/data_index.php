<?php
include('../../config/koneksi.php');

// hitung produk
$query_products = "SELECT COUNT(*) AS total FROM products";
$hasil_products = mysqli_query($conn, $query_products);
$jumlah_products = mysqli_fetch_assoc($hasil_products);

// hitung kategori
$query_category = "SELECT COUNT(*) AS total FROM product_categories";
$hasil_category = mysqli_query($conn, $query_category);
$jumlah_category = mysqli_fetch_assoc($hasil_category);

// hitung users
$query_users = "SELECT COUNT(*) AS total FROM users";
$hasil_users = mysqli_query($conn, $query_users);
$jumlah_users = mysqli_fetch_assoc($hasil_users);

