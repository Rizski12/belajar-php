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
        require_once 'variabel-produk.php';

        // Tampilan data produk1
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk1['badge'] . '</span>';
        echo '<img src="' . $produk1['gambar'] . '" alt="' . $produk1['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk1['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk1['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk1['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk1['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk2
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk2['badge'] . '</span>';
        echo '<img src="' . $produk2['gambar'] . '" alt="' . $produk2['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk2['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk2['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk2['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk2['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk3
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk3['badge'] . '</span>';
        echo '<img src="' . $produk3['gambar'] . '" alt="' . $produk3['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk3['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk3['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk3['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk3['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk4
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk4['badge'] . '</span>';
        echo '<img src="' . $produk4['gambar'] . '" alt="' . $produk4['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk4['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk4['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk4['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk4['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk5
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk5['badge'] . '</span>';
        echo '<img src="' . $produk5['gambar'] . '" alt="' . $produk5['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk5['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk5['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk5['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk5['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk6
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk6['badge'] . '</span>';
        echo '<img src="' . $produk6['gambar'] . '" alt="' . $produk6['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk6['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk6['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk6['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk6['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk7
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk7['badge'] . '</span>';
        echo '<img src="' . $produk7['gambar'] . '" alt="' . $produk7['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk7['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk7['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk7['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk7['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk8
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk8['badge'] . '</span>';
        echo '<img src="' . $produk8['gambar'] . '" alt="' . $produk8['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk8['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk8['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk8['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk8['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk9
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk9['badge'] . '</span>';
        echo '<img src="' . $produk9['gambar'] . '" alt="' . $produk9['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk9['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk9['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk9['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk9['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk10
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk10['badge'] . '</span>';
        echo '<img src="' . $produk10['gambar'] . '" alt="' . $produk10['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk10['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk10['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk10['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk10['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk11
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk11['badge'] . '</span>';
        echo '<img src="' . $produk11['gambar'] . '" alt="' . $produk11['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk11['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk11['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk11['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk11['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Tampilan data produk12
        echo '<div class="card ml-4" style="width: 17rem">';
        echo '<span class="badge-produk">' .$produk12['badge'] . '</span>';
        echo '<img src="' . $produk12['gambar'] . '" alt="' . $produk12['nama'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $produk12['nama'] . '</h3>';
        echo '<p class="deskripsi">' . $produk12['deskripsi'] . '</p>';
        echo '<p class="toko">' . $produk12['toko'] . '</p>';
        echo '<h5 class="harga">Harga: $' . $produk12['harga'] . '</h5>';
        echo '<div class="flex">';
        echo '<button class="order-button me-md-2">Order</button>';
        echo '<button class="cart-button"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
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

    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
