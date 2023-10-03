<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Produk</title>
    <link rel="stylesheet" type="text/css" href="../dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
    <div class="container-fluid">
    <!--awal navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="../assets/images/logo.jpg" style="border-radius:70%;" class="me-2" alt="Bootstrap" width="35" height="35">Rdp<strong>Store</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex ms-auto" role="search">
            <input class="form-control me-2" style="width: 350px;" type="search" placeholder="Cari Produk Anda!" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Cari</button>
        </form>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#">Keranjang</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#">Daftar</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="../logout.php">Keluar</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!--Akhir navbar-->

    <!--Awal carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="../assets/images/slide1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Hallo Guys!!</h5>
            <p>Welcome to our online shop website.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="../assets/images/slide2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>What do you want to buy </h5>
            <p>Has anyone found the product you are looking for?</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="../assets/images/slide3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Happy shopping</h5>
            <p>Happy shopping have a nice day.</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- Akhir Carousel-->

    <!-- Awal Kategori-->
    <div class="container-fluid">
        <div class="judul-kategori mt-4">
            <h5 class="text-center text-light">KATEGORI PRODUK</h5>
        </div>
        <div class="row text-center row-container mt-2">
        <?php
            include 'kategori.php';

            foreach ($kategori as $item) {
                echo '<div class="col-lg-2 col-md-3 col-sm-4 ">';
                echo '<div class="menu-kategori mt-3">';
                echo '<a href="#"><img src="' . $item['gambar'] . '" alt="' . $item['nama'] . '" class="img-kategori mt-3"></a>';
                echo '<p class="mt-2 text-light">' . $item['nama'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <!-- Awal Kategori-->


    <!-- Awal Produk-->
    <div class="judul-produk mt-4">
        <h5 class="text-center text-light">PRODUK</h5>
    </div>
        <div class="produk-container mt-2">
            <?php
            include 'variabel-produk.php';

            foreach ($produkList as $item) {
                echo '<div class="card ml-4" style="width: 17rem">';
                echo '<span class="badge-produk">' .$item['badge'] . '</span>';
                echo '<img src="' . $item['gambar'] . '" alt="' . $item['nama'] . '">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">' . $item['nama'] . '</h3>';
                echo '<p class="deskripsi">' . $item['deskripsi'] . '</p>';
                echo '<p class="toko">' . $item['toko'] . '</p>';
                echo '<h5 class="harga">Harga: $' . $item['harga'] . '</h5>';
                echo '<div class="flex">';
                echo '<button class="order-button me-md-2">Order</button>';
                echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <!-- Akhir Produk-->

     <!--Awal footer-->
    <footer class="bg-dark text-white p-5">
        <div class="row">
        <div class="col-md-3">
            <h5>LAYANAN PELANGGAN</h5>
            <ul>
            <li><a class="link" href="pembelian.html">Cara Pembelian<a</li>
            <li><a class="link" href="pengiriman.html">Pengiriman</a></li>
            <li><a class="link" href="pengembalian.html">Cara Pengembalian</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h5>TENTANG KAMI</h5>
            <ul>
            <li><a class="link" href="Tentangkami.html">About us</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h5>MITRA KERJASAMA</h5>
            <ul>
            <li><a href="https://www.gojek.com/id-id/help/login/cara-masuk-ke-akun-gojek/" target="_blank">GOJEK</a></li>
            <li><a href="https://www.grab.com/id/driver/drive/" target="_blank">GRAB</a></li>
            <li><a href="https://www.jne.co.id/id/beranda" target="_blank">JNE</a></li>
            <li><a href="https://www.posindonesia.co.id/id" target="_blank">PT. Pos Indonesia</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h5>HUBUNGI KAMI</h5>
            <ul>
            <li><a href="https://wa.me/62895602084841?text=Saya ingin bertanya" target="_blank">0895602084841</a></li>
            <li><a href="mailto:rizkidianpratama176@gmail.com">Kirim Email</a></li>
            </ul>
        </div>
        </div>
    </footer>
    <div class="copyright text-center text-white font-weight-bold bg-secondary p-1">
        <p>Developed by rizkidian Copyright
        <i class="far fa-copyright"></i> 2023
        </p>
    </div>
    <!--Akhir footer-->

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
